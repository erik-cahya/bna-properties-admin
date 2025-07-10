<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\PropertiesModel;
use App\Models\PropertyGalleryImageModel;
use App\Models\PropertyGalleryModel;
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

        $dataProperties = PropertiesModel::where('slug', $slug)->first();

        $data['bookedRanges'] = BookingModel::where('properties_id', $dataProperties->id)->where('status', 'accept')->get()->map(function ($rental) {
            return [
                'from' => Carbon::parse($rental->start_date)->toDateString(),
                'to' => Carbon::parse($rental->end_date)->toDateString(),
            ];
        });

        $data['imageGallery'] = PropertyGalleryModel::where('properties_id', $dataProperties->id)
            ->join('property_gallery_image', 'property_gallery_image.gallery_id', '=', 'property_gallery.id')
            ->select('property_gallery_image.image_path', 'property_gallery.id')
            ->get();

        // dd($data['imageGallery']);

        // dd($data['bookedRanges']);
        return view('landing.properties.details', $data);
    }
}
