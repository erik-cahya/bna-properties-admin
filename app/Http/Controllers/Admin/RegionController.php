<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;

use App\Models\RegionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the regions.
     */
    public function index()
    {
        $regions = RegionModel::all();
        return view('admin.region.index', compact('regions'));
    }

    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created region in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:regions,name',
        ]);

        $region = RegionModel::create([
            'name' => $request->name,
        ]);

            $flashData = [
            'judul' => 'Success!',
            'pesan' => 'Area Created.',
            'swalFlashIcon' => 'success'
        ];
        return redirect()->route('region.index')->with('flashData', $flashData);
    }

    /**
     * Display the specified region.
     */
    public function show($id)
    {
        $region = RegionModel::findOrFail($id);
        return view('region.show', compact('region'));
    }

    /**
     * Update the specified region in storage.
     */
    public function update(Request $request, $id)
    {
        $region = RegionModel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:regions,name,' . $region->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'judul'   => 'Validation Error',
                'pesan'   => $validator->errors()->first('name'),
                'swalFlashIcon' => 'error'
            ], 422);
        }

        $region->update([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'judul'   => 'Success',
            'pesan'   => 'Region updated successfully!',
            'swalFlashIcon' => 'success'
        ]);
    }

    /**
     * Remove the specified region from storage.
     */
    public function destroy($id)
    {
        try {
            $region = RegionModel::findOrFail($id);
            $region->delete();

            return response()->json([
                'judul' => 'Success!',
                'pesan' => 'Area deleted successfully.',
                'swalFlashIcon' => 'success'
            ]);
        }  catch (\Illuminate\Database\QueryException $e) {
        // MySQL foreign key constraint code = 1451
        if ($e->getCode() == 23000) {
            return response()->json([
                'judul' => 'Error!',
                'pesan' => 'This area cannot be deleted because it is still used in one or more properties.',
                'swalFlashIcon' => 'error'
            ], 400);
        }

        return response()->json([
            'judul' => 'Error!',
            'pesan' => 'Something went wrong while deleting the area.',
            'swalFlashIcon' => 'error'
        ], 500);
    }
    }
}
