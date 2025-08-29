<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PropertiesModel;
use App\Models\RegionModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['data_properties'] = PropertiesModel::get();
        $regions = RegionModel::all();
        $latestListings = PropertiesModel::orderBy('created_at', 'desc')->get();

        $query = PropertiesModel::query();

        $properties = $query->paginate(12);

        // Specific region data (id + count) from existing $data['data_properties']
        $counts = [
            'Seminyak' => [
                'id' => optional($data['data_properties']->firstWhere('region.name', 'Seminyak'))->region_id,
                'count' => $data['data_properties']->where('region.name', 'Seminyak')->count(),
            ],

            'Canggu' => [
                'id' => optional($data['data_properties']->firstWhere('region.name', 'Canggu'))->region_id,
                'count' => $data['data_properties']->where('region.name', 'Canggu')->count(),
            ],

            'Kerobokan' => [
                'id' => optional($data['data_properties']->firstWhere('region.name', 'Kerobokan'))->region_id,
                'count' => $data['data_properties']->where('region.name', 'Kerobokan')->count(),
            ],
        ];


        return view('landing.home.index', $data, compact('regions', 'latestListings', 'counts'));
    }
}
