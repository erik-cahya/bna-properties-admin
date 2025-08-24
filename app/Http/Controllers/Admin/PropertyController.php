<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureListModel;
use App\Models\FeaturePropertyModel;
use App\Models\PropertiesModel;
use App\Models\PropertyGalleryImageModel;
use App\Models\PropertyGalleryModel;
use App\Models\RegionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_properties'] = PropertiesModel::with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id');
            $query->where('is_featured', 1);
        }])->get();

        return view('admin.properties.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['regions'] = RegionModel::get();
        $data['data_features'] = FeatureListModel::get();
        return view('admin.properties.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'propertiesName' => 'required:min:4',
            'statusListing' => 'required',
            'typeProperties' => 'required',
            'numberBedroom' => 'required',
            'numberBathroom' => 'required',
            'propertiesSize' => 'required',
            'yearBuild' => 'required',
            'maxPeople' => 'required',
            // 'priceIDR' => 'required',
            'priceUSD' => 'required',
            'region' => 'required',
            // 'subRegion' => 'required',
            'address' => 'required',
        ]);
        
        // dd($request->all());
        // $region = RegionModel::where('id', $request->region)->first();        
        // $idrPrice = (int)preg_replace('/[^0-9]/', '', $request->priceIDR);
        // $subregion = SubRegionModel::where('id', $request->subRegion)->first();

        $slug = $this->generateSlug($request->propertiesName);

        // Find the latest properties_code
        $lastProperty = PropertiesModel::orderBy('id', 'desc')->first();

        if ($lastProperty) {
            // Extract number part from properties_code
            $lastNumber = (int) str_replace('BNA-', '', $lastProperty->properties_code);
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1; // First property
        }

        // Format with leading zeros (0001, 0002, etc.)
        $newCode = 'BNA-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // ================================================ //
        // ########### Create Property Listing ############ // 
        // ================================================ //

        $propertyCreate = PropertiesModel::create([
            'properties_code' => $newCode,
            'properties_name' => $request->propertiesName,
            'slug' => $slug,
            'description' => $request->description,
            'region_id' => $request->region,
            // 'sub_region' => $subregion->name,
            'address' => $request->address,
            'type_properties' => $request->typeProperties,
            'number_bedroom' => $request->numberBedroom,
            'number_bathroom' => $request->numberBathroom,
            'properties_size' => $request->propertiesSize,
            'year_build' => $request->yearBuild,
            'max_people' => $request->maxPeople,
            'price_idr' => null,
            // 'price_usd' => round((float)$idrPrice / $this->getUSDtoIDRRate(), 2),
            'price_usd' => floatval(preg_replace('/[^\d.]/', '', $request->priceUSD)),
            'status_listing' => $request->statusListing,
        ]);

        // ==================================================== //
        // ########### Create Property Feature Data ########### //
        // ==================================================== //
        if (!empty($request->feature) && is_array($request->feature)) {
            foreach ($request -> feature as $index => $feature) {
                $idFeature = FeatureListModel::select('id')->where('slug', $index)->first(); //$index contain slug
                FeaturePropertyModel::create([
                    'properties_id' => $propertyCreate->id,
                    'feature_id' => $idFeature->id
                ]);
            }
        }

        // ============================================= //
        // ############## Gallery Handler ############## //
        // ============================================= //

        $gallery = PropertyGalleryModel::create([
            'properties_id' => $propertyCreate->id,
            'description' => 'deskripsi',
        ]);

        if (!file_exists(public_path('admin/gallery/' . $slug))) {
            mkdir(public_path('admin/gallery/' . $slug), 0755, true);
        }

        $order = explode(',', $request->order);

        foreach ($order as $i => $index) {
            if (isset($request->images[$index])) {
                $image = $request->images[$index];
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/gallery/' . $slug), $filename);

                PropertyGalleryImageModel::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => 'admin/gallery/' . $slug . '/' . $filename,
                    'order' => $i,
                    'is_featured' => $i === 0,
                ]);
            }
        }
        // /* Gallery Handler

        $flashData = [
            'judul' => 'Listing Success',
            'pesan' => 'New Properties Added Successfully',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('properties.index')->with('flashData', $flashData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data['dataProperties'] = PropertiesModel::where('slug', $slug)->with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id');
            $query->where('is_featured', 1);
        }])->first();

        $data['feature_list'] = FeaturePropertyModel::where('properties_id', $data['dataProperties']->id)
            ->join('feature_list', 'feature_list.id', '=', 'feature_property.feature_id')
            ->select('feature_list.name as feature_name')
            ->get();

        $data['image_gallery'] = PropertyGalleryImageModel::where('gallery_id', $data['dataProperties']['featuredImage']->id)->get();


        return view('admin.properties.details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['regions'] = RegionModel::all();
        $data['data_features'] = FeatureListModel::all();
        $data['property'] = PropertiesModel::with(['features', 'featuredImage'])->findOrFail($id);

        $data['imageGallery'] = PropertyGalleryModel::where('properties_id', $id)
            ->join('property_gallery_image', 'property_gallery_image.gallery_id', '=', 'property_gallery.id')
            ->select(
                'property_gallery_image.id as image_id',
                'property_gallery_image.image_path',
                'property_gallery_image.order',
                'property_gallery_image.is_featured',
                'property_gallery.id as gallery_id'
            )
            ->orderBy('property_gallery_image.order', 'asc')
            ->get();


        return view('admin.properties.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'propertiesName' => 'required',
            'statusListing' => 'required',
            'typeProperties' => 'required',
            'numberBedroom' => 'required',
            'numberBathroom' => 'required',
            'propertiesSize' => 'required',
            'yearBuild' => 'required',
            'maxPeople' => 'required',
            'priceUSD' => 'required',
            'region' => 'required',
            'address' => 'required',
        ]);

        $property = PropertiesModel::findOrFail($id);

        // Regenerate slug only if name changes
        $slug = $property->properties_name !== $request->propertiesName
            ? $this->generateSlug($request->propertiesName)
            : $property->slug;

        $property->update([
            'properties_name' => $request->propertiesName,
            'slug' => $slug,
            'description' => $request->description,
            'region_id' => $request->region,
            'address' => $request->address,
            'type_properties' => $request->typeProperties,
            'number_bedroom' => $request->numberBedroom,
            'number_bathroom' => $request->numberBathroom,
            'properties_size' => $request->propertiesSize,
            'year_build' => $request->yearBuild,
            'max_people' => $request->maxPeople,
            'price_usd' => floatval(preg_replace('/[^\d.]/', '', $request->priceUSD)),
            'status_listing' => $request->statusListing,
        ]);

        // ====================== Update Features ====================== //
        FeaturePropertyModel::where('properties_id', $property->id)->delete();

        if (!empty($request->feature) && is_array($request->feature)) {
            foreach ($request->feature as $index => $feature) {
                $idFeature = FeatureListModel::select('id')->where('slug', $index)->first();
                if ($idFeature) {
                    FeaturePropertyModel::create([
                        'properties_id' => $property->id,
                        'feature_id'    => $idFeature->id
                    ]);
                }
            }
        }

        // ====================== Update Gallery ====================== //
        $gallery = PropertyGalleryModel::firstOrCreate(
            ['properties_id' => $property->id],
            ['description' => 'deskripsi']
        );

        if (!file_exists(public_path('admin/gallery/' . $slug))) {
            mkdir(public_path('admin/gallery/' . $slug), 0755, true);
        }

        // ✅ Handle image deletions
        if ($request->filled('deleted_ids')) {
            $deletedIds = explode(',', $request->deleted_ids);

            $imagesToDelete = PropertyGalleryImageModel::whereIn('id', $deletedIds)->get();
            foreach ($imagesToDelete as $img) {
                if (file_exists(public_path($img->image_path))) {
                    unlink(public_path($img->image_path));
                }
                $img->delete();
            }
        }

        // ✅ Handle reordering & new uploads
        if ($request->has('order')) {
            $order = json_decode($request->order, true);

            foreach ($order as $i => $item) {
                if ($item['type'] === 'existing') {
                    PropertyGalleryImageModel::where('id', $item['id'])
                        ->update([
                            'order' => $i,
                            'is_featured' => $i === 0,
                        ]);
                } elseif ($item['type'] === 'new' && isset($request->images[$item['index']])) {
                    $image = $request->images[$item['index']];
                    $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/gallery/' . $slug), $filename);

                    PropertyGalleryImageModel::create([
                        'gallery_id'  => $gallery->id,
                        'order'       => $i,
                        'image_path'  => 'admin/gallery/' . $slug . '/' . $filename,
                        'is_featured' => $i === 0,
                    ]);
                }
            }
        }

        $flashData = [
            'judul' => 'Listing Updated',
            'pesan' => 'Property updated successfully',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('properties.index')->with('flashData', $flashData);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slug = PropertiesModel::where('id', $id)->first();

            if (file_exists(public_path('admin/gallery/' . $slug->slug))) {
                File::deleteDirectory(public_path('admin/gallery/' . $slug->slug));
            }

            PropertiesModel::destroy($id);

            return response()->json([
                'judul' => 'Delete Success',
                'pesan' => 'Data Property Telah Dihapus',
                'swalFlashIcon' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'judul' => 'Delete Failed',
                'pesan' => $e->getMessage(), // This will reveal the real cause
                'swalFlashIcon' => 'error',
            ], 500);
        }
    }


    // private function dateConversion($date)
    // {
    //     return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
    // }

    // private function getUSDtoIDRRate()
    // {
    //     return Cache::remember('usd_to_idr_rate', now()->addHours(1), function () {
    //         try {
    //             $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');
    //             return $response['rates']['IDR'] ?? 15000;
    //         } catch (\Exception $e) {
    //             return 15000;
    //         }
    //     });
    // }

    // public function getSubregions($regionId)
    // {
    //     $subregions = SubRegionModel::where('region_id', $regionId)->get(); 

    //     return response()->json($subregions);
    // }

    private function generateSlug($name)
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        // Cek property slug if exist in database
        while (PropertiesModel::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function updateGallery(Request $request, $propertyId)
    {
        $property = PropertiesModel::findOrFail($propertyId);

        // 1. Handle deleted images
        if ($request->filled('deleted_ids')) {
            $ids = explode(',', $request->deleted_ids);

            foreach ($ids as $id) {
                $img = PropertyGalleryImageModel::find($id);
                if ($img) {
                    // Delete physical file if needed
                    if (file_exists(public_path($img->image_path))) {
                        unlink(public_path($img->image_path));
                    }
                    $img->delete();
                }
            }
        }

        // 2. Handle ordering
        if ($request->filled('order')) {
            $order = json_decode($request->order, true);
            foreach ($order as $i => $item) {
                if ($item['type'] === 'existing' && !empty($item['id'])) {
                    PropertyGalleryImageModel::where('id', $item['id'])
                        ->update(['sort_order' => $i]);
                }
            }
        }

        // 3. Handle new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('gallery', 'public');
                PropertyGalleryImageModel::create([
                    'property_id' => $property->id,
                    'image_path' => 'storage/' . $path,
                    'sort_order' => 0, // will be updated on reorder
                ]);
            }
        }

        return back()->with('success', 'Gallery updated!');
    }

}
