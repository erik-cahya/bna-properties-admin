<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureListModel;
use App\Models\PropertiesModel;
use App\Models\RegionModel;
use App\Models\SubRegionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_properties'] = PropertiesModel::get();
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
            'priceIDR' => 'required',
            // 'priceUSD' => 'required',
            'region' => 'required',
            'subRegion' => 'required',
            'address' => 'required',
        ]);

        // dd($request->all());


        $idrPrice = (int)preg_replace('/[^0-9]/', '', $request->priceIDR);

        $region = RegionModel::where('id', $request->region)->first();
        $subregion = SubRegionModel::where('id', $request->subRegion)->first();

        PropertiesModel::create([
            'properties_code' => 'BNA-' . random_int(1000000000, 9999999999),
            'properties_name' => $request->propertiesName,
            'slug' => Str::slug($request->propertiesName),
            'region' => $region->name,
            'sub_region' => $subregion->name,
            'address' => $request->address,
            'type_properties' => $request->typeProperties,
            'number_bedroom' => $request->numberBedroom,
            'number_bathroom' => $request->numberBathroom,
            'properties_size' => $request->propertiesSize,
            'year_build' => $request->yearBuild,
            'max_people' => $request->maxPeople,
            'price_idr' => $idrPrice,
            'price_usd' => round((float)$idrPrice / $this->getUSDtoIDRRate(), 2),
        ]);

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
    public function show(string $id)
    {
        //
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
        //
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
}
