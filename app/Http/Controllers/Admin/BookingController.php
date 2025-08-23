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

        BookingModel::where('id', $bookingId)->update(['status' => $status]);

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Status berhasil diubah.',
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
                'customers.customer_address',
            )
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

        $bookings = BookingModel::join('properties', 'properties.id', '=', 'bookings.properties_id')
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
                'customers.customer_address',
            )
            ->get();
        // dd($bookings);

        $users = BookingModel::select('customer_id', 'properties_id', 'start_date', 'end_date', 'status')->get();

        $data = [
            [
                'Number',
                'Name',
                'Email',
                'Phone',
                'Villa',
                'Address',
                'Start Date',
                'End Date',
                'Status'
            ], // header
        ];

        $number = 1;
        foreach ($bookings as $booking) {
            $data[] = [
                $number++,
                $booking->customer_name,
                $booking->customer_email,
                $booking->customer_phone,
                $booking->properties_name,
                $booking->address,
                $booking->start_date,
                $booking->end_date,
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
        }, 'booking_' . Carbon::today() . '.xlsx', ExcelType::XLSX);
    }
}
