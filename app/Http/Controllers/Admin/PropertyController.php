<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureListModel;
use App\Models\PropertiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'yearBuild' => 'required',
            'maxPeople' => 'required',
            'priceIDR' => 'required',
            'priceUSD' => 'required',
            'region' => 'required',
            'subRegion' => 'required',
            'address' => 'required',
        ]);

        dd($request->all());

        PropertiesModel::create([
            'properties_name' => $request->propertiesName,
            'slug' => Str::slug($request->propertiesName),
            'region' => $request->region,
            'sub_region' => $request->subRegion,
            'address' => $request->address,
            'type_properties' => $request->typeProperties,
            'number_bedroom' => $request->numberBedroom,
            'number_bathroom' => $request->numberBathroom,
            'properties_size' => $request->propertiesSize,
            'year_build' => $request->yearBuild,
            'max_people' => $request->maxPeople,
            'price_idr' => $request->priceIDR,
            'price_usd' => $request->priceUSD,
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
    }
}
