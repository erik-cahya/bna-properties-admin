<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureListModel;
use App\Models\FeaturePropertyModel;
use App\Models\PropertiesModel;
use App\Models\PropertyGalleryImageModel;
use App\Models\PropertyGalleryModel;
use App\Models\RegionModel;
use App\Models\SubRegionModel;
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
        // dd($request->all());
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
            'subRegion' => 'required',
            'address' => 'required',
        ]);

        // dd($request->all());


        $idrPrice = (int)preg_replace('/[^0-9]/', '', $request->priceIDR);

        $region = RegionModel::where('id', $request->region)->first();
        $subregion = SubRegionModel::where('id', $request->subRegion)->first();

        $slug = $this->generateSlug($request->propertiesName);

        // ==========================================================================================================================================
        // ########### Create Property Listing
        // ==========================================================================================================================================
        $propertyCreate = PropertiesModel::create([
            'properties_code' => 'BNA-' . random_int(1000000000, 9999999999),
            'properties_name' => $request->propertiesName,
            'slug' => $slug,
            'description' => $request->description,
            'region' => $region->name,
            'sub_region' => $subregion->name,
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

        // ==========================================================================================================================================
        // ########### Create Property Feature Data
        // ==========================================================================================================================================
        foreach ($request->feature as $index => $feature) {
            $idFeature = FeatureListModel::select('id')->where('slug', $index)->first();
            FeaturePropertyModel::create([
                'properties_id' => $propertyCreate->id,
                'feature_id' => $idFeature->id
            ]);
        }

        // ==========================================================================================================================================
        // ############## Gallery Handler ##############
        // ==========================================================================================================================================
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slug = PropertiesModel::where('id', $id)->first();

        // Delete File Gallery
        if (file_exists(public_path('admin/gallery/' . $slug->slug))) {
            File::deleteDirectory(public_path('admin/gallery/' . $slug->slug));
        };

        PropertiesModel::destroy($id);
        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data Property Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }

    private function dateConversion($date)
    {
        return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
    }

    private function getUSDtoIDRRate()
    {
        return Cache::remember('usd_to_idr_rate', now()->addHours(1), function () {
            try {
                $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');
                return $response['rates']['IDR'] ?? 15000;
            } catch (\Exception $e) {
                return 15000;
            }
        });
    }

    public function getSubregions($regionId)
    {
        $subregions = SubRegionModel::where('region_id', $regionId)->get();

        return response()->json($subregions);
    }

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
}
