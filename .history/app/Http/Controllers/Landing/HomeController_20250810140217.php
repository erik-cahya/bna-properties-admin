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

        return view('landing.home.index', $data, compact('regions', 'latestListings'));
    }
}
