<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PropertiesModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['data_properties'] = PropertiesModel::get();

        return view('landing.home.index', $data);
    }
}
