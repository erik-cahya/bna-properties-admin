<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomerModel::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'service_type' => 'required|string',
        ]);

        // Merge service_type into message
        $fullMessage = "Service requested: " . $request->service_type;
        if (!empty($request->message)) {
            $fullMessage .= "\nMessage: " . $request->message;
        }

        $customer = CustomerModel::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'message' => $fullMessage,
        ]);

        return redirect()->back()->with('success', 'Customer created successfully!');
    }


    public function show($id)
    {
        $customer = CustomerModel::findOrFail($id);
        return view('admin.customer.show', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->delete();

        return response()->json([
            'judul' => 'Success!',
            'pesan' => 'Customer Deleted.',
            'swalFlashIcon' => 'success'
        ]);
    }
}

