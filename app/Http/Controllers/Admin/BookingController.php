<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\PropertiesModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelType;
use Maatwebsite\Excel\Concerns\FromArray;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function changeStatus(Request $request)
    {
        $bookingId = $request->input('booking_id');
        $status = $request->input('status');

        // Update booking status
        $booking = BookingModel::findOrFail($bookingId);
        $booking->status = $status;
        $booking->save();

        // Update related property status
        $property = $booking->properties; // assuming relationship defined

        if ($property) {
            if (in_array($status, ['Confirmed', 'On Going'])) {
                $property->status_listing = 'Rented';
                $property->save();
            } else {
                $property->status_listing = 'Available';
                $property->save();
            }
        }

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Status has been changed.',
            'swalFlashIcon' => 'success'
        ]);
    }

    public function updateStartDate(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'start_date' => 'required|date',
        ]);

        BookingModel::where('id', $request->booking_id)
            ->update(['start_date' => $request->start_date]);

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Start date updated successfully.',
            'swalFlashIcon' => 'success'
        ]);
    }

    public function updateEndDate(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'end_date' => 'required|date',
        ]);

        BookingModel::where('id', $request->booking_id)
            ->update(['end_date' => $request->end_date]);

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Data has been changed.',
            'swalFlashIcon' => 'success'
        ]);
    }

    public function updateDpStatus(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|string|in:Paid,Unpaid,No Deposit'
        ]);

        BookingModel::where('id', $request->booking_id)
            ->update(['dp_status' => $request->status]);

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Booking status updated successfully.',
            'swalFlashIcon' => 'success'
        ]);
    }

    public function updateDpAmount(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'dp_amount' => 'required|numeric|min:0'
        ]);

        BookingModel::where('id', $request->booking_id)
            ->update(['dp_amount' => intval($request->dp_amount)]);

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Deposit amount updated successfully.',
            'swalFlashIcon' => 'success'
        ]);
    }

    
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $data['bookingToday'] = BookingModel::whereDate('created_at', Carbon::today())->get();

        $data['bookingData'] = BookingModel::join('properties', 'properties.id', '=', 'bookings.properties_id')
            ->join('customers', 'customers.id', '=', 'bookings.customer_id')
            ->select(
                'bookings.*',

                'properties.properties_name',
                'properties.address',
                'properties.type_properties',
                'properties.max_people',
                'properties.price_usd',

                'customers.customer_name',
                'customers.customer_email',
                'customers.customer_phone',
                'customers.message',

            )
            ->get();

        foreach ($data['bookingData'] as $booking) {
            // $start = Carbon::parse($booking->start_date);
            // $end = Carbon::parse($booking->end_date);
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
            'message' => $request->message,
        ]);

        BookingModel::create([
            'customer_id' => $newCustomerData->id,
            'properties_id' => $propertyData->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dp_status' => 'Unpaid',
            'dp_amount' => 0,
            'status' => 'Pending',
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

        BookingModel::destroy($id);
        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data Booking Successfully Delete',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }

    public function exportExcel()
    {
        $bookings = BookingModel::with(['customer', 'properties.region'])->get();

        $data = [
            ['Customer Name', 'Customer Phone', 'Customer Email', 'Villa ID', 'Villa Name', 'Location', 'Start Date', 'End Date', 'Created at', 'DP Status', 'Status'],
        ];

        foreach ($bookings as $booking) {
            $data[] = [
                $booking->customer->customer_name,       
                $booking->customer->customer_phone,       
                $booking->customer->customer_email,       
                $booking->properties->properties_code,      
                $booking->properties->properties_name,    
                $booking->properties->region->name,  
                $booking->start_date,
                $booking->end_date,
                $booking->created_at,
                $booking->dp_status,
                $booking->status,
            ];
        }


        // Export tanpa membuat class terpisah
        return Excel::download(new class($data) implements FromArray {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }
        }, 'booking.xlsx', ExcelType::XLSX);
    }
}
