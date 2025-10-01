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

use App\Mail\InquiryMail;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;


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

        $customer = $booking->customer;

        // Send email only if status is confirmed
        if (strtolower($status) === 'confirmed') {
            $details = [
                'property_name' => $property->properties_name,
                'start_date' => $booking->start_date,
                'end_date' => $booking->end_date,
                'customer_name' => $customer->customer_name,
            ];

            Mail::to($customer->customer_email)->send(new ConfirmMail($details));
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

        // Bookings for today
        $bookingToday = BookingModel::whereDate('created_at', Carbon::today())->get();

        // All booking details with joins
        $bookingData = BookingModel::join('properties', 'properties.id', '=', 'bookings.properties_id')
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

        foreach ($bookingData as $booking) {
            $booking->remainingDays = now()->diffInDays(Carbon::parse($booking->end_date));
            $booking->alreadyBooked = Carbon::parse($booking->start_date)->diffInDays(now(), false);
        }

        // Villas for dropdown
        $properties = PropertiesModel::select('id', 'slug', 'properties_code', 'properties_name')->get();

        // Build disabled date ranges for each villa
        $villas = PropertiesModel::all();
        $villaRanges = [];

        foreach ($villas as $villa) {
            $bookings = BookingModel::where('properties_id', $villa->id)
                ->whereIn('status', ['confirmed', 'Confirmed', 'On Going', 'on going', 'On going'])
                ->orderBy('start_date')
                ->get();

            foreach ($bookings as $booking) {
                $start = Carbon::parse($booking->start_date);
                $end   = Carbon::parse($booking->end_date);

                $villaRanges[$villa->id][] = [
                    'from' => $start->toDateString(),
                    'to'   => $end->toDateString(),
                ];
            }
        }
        // dd($villaRanges);

        return view('admin.booking.index', compact('properties', 'bookingToday', 'bookingData', 'villaRanges'));
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

        $validated = $request->validate([
            // Customer validations
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'full_phone' => 'required|string|max:20',
            'message'    => 'nullable|string',

            // Booking validations
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        // Create customer
        $newCustomerData = CustomerModel::create([
            'customer_name'  => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_phone' => $validated['full_phone'],
            'message'        => $validated['message'] ?? null,
        ]);

        // Create booking
        BookingModel::create([
            'customer_id'  => $newCustomerData->id,
            'properties_id'=> $propertyData->id, // make sure $propertyData is defined earlier
            'start_date'   => $validated['start_date'],
            'end_date'     => $validated['end_date'],
            'dp_status'    => 'Unpaid',
            'dp_amount'    => 0,
            'status'       => 'Pending',
        ]);

        $details = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['full_phone'],
            'message' => $validated['message'],
            'property_id' => $propertyData->properties_code,
            'property_name' => $propertyData->properties_name,
        ];

        Mail::to('agungcantona11@gmail.com')->send(new InquiryMail($details));

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Inquiry has been sent.',
            'swalFlashIcon' => 'success'
        ]);

        // return redirect()->route('landing.index');

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
