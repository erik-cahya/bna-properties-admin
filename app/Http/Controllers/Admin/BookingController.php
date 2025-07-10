<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\PropertiesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $data['bookingData'] = BookingModel::join('properties', 'properties.id', '=', 'bookings.properties_id')
            ->join('customers', 'customers.id', '=', 'bookings.customer_id')
            ->get();

        foreach ($data['bookingData'] as $booking) {
            $start = Carbon::parse($booking->start_date);
            $end = Carbon::parse($booking->end_date);
            $remainingDays = now()->diffInDays(Carbon::parse($booking->end_date));

            $alreadyBooked = Carbon::parse($booking->start_date)->diffInDays(now(), false);


            // dd($alreadyBooked);

            $data['bookingData']->remainingDays = $remainingDays;
            $data['bookingData']->alreadyBooked = $alreadyBooked;
        }

        // dd($data['bookingData']);

        return view('admin.booking.index', $data);
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
        $propertyData = PropertiesModel::where('slug', $request->propertySlug)->first();

        $newCustomerData = CustomerModel::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
        ]);

        BookingModel::create([
            'customer_id' => $newCustomerData->id,
            'properties_id' => $propertyData->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'new booking',
        ]);

        return redirect()->route('landing.index');

        // BookingModel::create([]);
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
        //
    }
}
