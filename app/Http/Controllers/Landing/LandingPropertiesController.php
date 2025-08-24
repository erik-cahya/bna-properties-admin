<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\FeatureListModel;
use App\Models\FeatureListPropertyModel;
use App\Models\PropertiesModel;
use App\Models\PropertyGalleryImageModel;
use App\Models\PropertyGalleryModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\RegionModel;
use Illuminate\Support\Collection;



class LandingPropertiesController extends Controller
{

    public function index(Request $request)
    {
        $query = PropertiesModel::with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id')
                ->where('is_featured', 1);
        }]);

        // Default: only available
        if ($request->filled('status_listing') && $request->status_listing === 'available') {
            $query->whereIn('status_listing', ['Available', 'available']);
        }

        // Region filter
        if ($request->filled('region')) {
            $query->whereIn('region_id', $request->region);
        }

        // Price filter
        if ($request->filled('price_usd')) {
            $prices = (array) $request->price_usd; // force into array

            $query->where(function($q) use ($prices) {
                foreach ($prices as $price) {
                    if ($price === '0-1000') {
                        $q->orWhereBetween('price_usd', [0, 1000]);
                    } elseif ($price === '1000-5000') {
                        $q->orWhereBetween('price_usd', [1000, 5000]);
                    } elseif ($price === '5000-10000') {
                        $q->orWhereBetween('price_usd', [5000, 10000]);
                    } elseif ($price === '10000-20000') {
                        $q->orWhereBetween('price_usd', [10000, 20000]);
                    } elseif ($price === '20000+') {
                        $q->orWhere('price_usd', '>=', 20000);
                    }
                }
            });
        }

        // Bedrooms filter
        if ($request->filled('number_bedroom')) {
            $bedrooms = (array) $request->number_bedroom;

            // Handle "5+"
            if (in_array('5+', $bedrooms)) {
                $query->where(function($q) use ($bedrooms) {
                    $q->where('number_bedroom', '>=', 5);

                    // If other numbers are also selected, include them
                    $numericBedrooms = array_filter($bedrooms, fn($b) => $b !== '5+');
                    if (!empty($numericBedrooms)) {
                        $q->orWhereIn('number_bedroom', $numericBedrooms);
                    }
                });
            } else {
                // Only numeric bedrooms selected
                $query->whereIn('number_bedroom', $bedrooms);
            }
        }


        // Regions for dropdown
        $regions = RegionModel::all();
 
        // Filter summary text
        $filterText = [];
        if ($request->filled('region')) {
            $region = RegionModel::whereIn('id', $request->region)->get();
            if ($region->isNotEmpty()) {
                $filterText[] = "in " . $region->pluck('name')->join(', ');
            }
        }
        if ($request->filled('number_bedroom')) {
            $bedrooms = (array) $request->number_bedroom;

            foreach ($bedrooms as $bed) {
                $filterText[] = $bed === '5+' 
                    ? "with 5+ bedrooms" 
                    : "with $bed bedrooms";
            }
        }
        if ($request->filled('price_usd')) {
            $map = [
                '0-1000' => 'priced $0 – $1,000',
                '1000-5000' => 'priced $1,000 – $5,000',
                '5000-10000' => 'priced $5,000 – $10,000',
                '10000-20000' => 'priced $10,000 – $20,000',
                '20000+' => 'priced $20,000+',
            ];
            $filterText[] = $map[$request->price] ?? '';
        }

        // Sort
        if ($request->filled('sort')) {
            if ($request->sort === 'price_low_high') {
                $query->orderBy('price_usd', 'asc');
            } elseif ($request->sort === 'price_high_low') {
                $query->orderBy('price_usd', 'desc');
            }
        } else {
            // default sorting
            $query->latest();
        }
        
        // Run query
        /** @var \Illuminate\Pagination\LengthAwarePaginator $properties */
        $properties = $query->paginate(8);
        $htmlPagination = $properties->withQueryString()->links('vendor.pagination.custom-pagination')->toHtml();
        // return response()->json($query->get());
        
        $filterSummary = !empty($filterText) ? implode(' ', $filterText) : 'all properties available';
        // return response()->json($filterSummary);
        
        $totalProperties = $properties->total();


        // If request is AJAX → return only the results HTML
        if ($request->ajax()) {
            return response()->json([
                'htmlCard' => view('landing.properties.partials.property-card', compact('properties'))->render(),
                'htmlList' => view('landing.properties.partials.property-list', compact('properties'))->render(),
                'filterSummary' => $filterSummary,
                'totalProperties' => $totalProperties,
                'htmlPagination'  => $htmlPagination,
            ]);
        }

        // Normal page load
        return view('landing.properties.index', compact('properties', 'regions', 'filterSummary', 'totalProperties'));
    }

    public function search(Request $request)
    {
        $query = PropertiesModel::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('properties_name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->orWhere('address', 'LIKE', "%{$keyword}%");
            })
            ->orWhereHas('region', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%");
            });
        }

        $properties = $query->paginate(8);

        // Regions for dropdown
        $regions = RegionModel::all();

        // Count total properties
        $totalProperties = $query->count();

        // Build filter summary (for top bar)
        $filterSummary = [];
        if ($request->filled('search')) {
            $filterSummary = "Search results for '{$request->search}'";
        }

        return view('landing.properties.index', compact(
            'properties',
            'regions',
            'filterSummary',
            'totalProperties'
        ));

    }
        
    public function details($slug)
    {

        $data['data_properties'] = PropertiesModel::where('slug', $slug)->with(['featuredImage' => function ($query) {
            $query->select('image_path', 'property_gallery.id');
            $query->where('is_featured', 1);
        }])->first();

        $dataProperties = PropertiesModel::where('slug', $slug)->first();

        $bookings = BookingModel::where('properties_id', $dataProperties->id)
            ->whereIn('status', ['confirmed', 'Confirmed', 'On Going', 'on going', 'On going'])
            ->orderBy('start_date')
            ->get();

        $disabled = [];
        $minGap = 30; // days

        foreach ($bookings as $index => $booking) {
            $start = Carbon::parse($booking->start_date);
            $end = Carbon::parse($booking->end_date);

            // Always disable booked period
            $disabled[] = [
                'from' => $start->toDateString(),
                'to'   => $end->toDateString(),
            ];

            // Look at the previous booking (if exists)
            if ($index > 0) {
                $prevEnd = Carbon::parse($bookings[$index-1]->end_date);
                $gapDays = $start->diffInDays($prevEnd);

                // If the free gap < 30 days → disable that gap too
                if ($gapDays < $minGap) {
                    $disabled[] = [
                        'from' => $prevEnd->toDateString(),
                        'to'   => $start->toDateString(),
                    ];
                }
            }
        }

        $data['bookedRanges'] = $disabled;

        $data['imageGallery'] = PropertyGalleryModel::where('properties_id', $dataProperties->id)
            ->join('property_gallery_image', 'property_gallery_image.gallery_id', '=', 'property_gallery.id')
            ->select('property_gallery_image.image_path', 'property_gallery.id')
            ->get();

        $data['featuresData'] = FeatureListPropertyModel::where('properties_id', $dataProperties->id)
            ->join('feature_list', 'feature_list.id', '=', 'feature_property.feature_id')
            ->get();

        // dd($data['featuresData']);

        // dd($data['bookedRanges']);
        $data['getAllProperties'] = PropertiesModel::where('id', '!=', $dataProperties->id)->get();

        // dd($data['getAllProperties']);

        return view('landing.properties.details', $data);
    }




}
