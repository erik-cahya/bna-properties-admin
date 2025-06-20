<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertiesFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_features'] = FeatureListModel::get();
        return view('admin.properties-feature.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        FeatureListModel::create([
            'name' => $request->featuresName,
            'slug' => Str::slug($request->featuresName)
        ]);


        $flashData = [
            'judul' => 'Create Success',
            'pesan' => 'Data Feature Added Successfully',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('features.index')->with('flashData', $flashData);
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

        FeatureListModel::destroy($id);
        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data Property Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }
}
