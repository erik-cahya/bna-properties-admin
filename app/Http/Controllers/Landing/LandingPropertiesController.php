<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PropertiesModel;
use Illuminate\Http\Request;

class LandingPropertiesController extends Controller
{

    public function index()
    {
        $data['data_properties'] = PropertiesModel::with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id');
            $query->where('is_featured', 1);
        }])->where('status_listing', '!=', 'Pending')->get();

        return view('landing.properties.index', $data);
    }
    public function details($slug)
    {
        $data['data_properties'] = PropertiesModel::where('slug', $slug)->with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id');
            $query->where('is_featured', 1);
        }])->first();
        return view('landing.properties.details', $data);
    }
}
