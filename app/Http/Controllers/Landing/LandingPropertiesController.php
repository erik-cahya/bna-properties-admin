<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\PropertiesModel;
use Illuminate\Http\Request;
use Carbon\Carbon;


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

        $idProperties = PropertiesModel::where('slug', $slug)->first();

        $data['bookedRanges'] = BookingModel::where('properties_id', $idProperties->id)->get()->map(function ($rental) {
            return [
                'from' => $rental->start_date->toDateString(),
                'to' => $rental->end_date->toDateString(),
            ];
        });
        return view('landing.properties.details', $data);
    }
}
