<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\BookingModel;
use Illuminate\Http\Request;
use App\Models\PropertiesModel;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data['dataProperties'] = PropertiesModel::get();
        $data['customers'] = CustomerModel::get();
        $data['bookings'] = BookingModel::with(['customer', 'properties.region'])->get();

        $totalVillas= $data['dataProperties']->count();
        $data['boookingCount'] = $data['bookings']->count();
        $activeBookings = BookingModel::where('end_date', '>', Carbon::yesterday())->count();
        $data['availableVillas'] = $totalVillas - $activeBookings;

        return view('admin.dashboard.index', $data);
    }
}
