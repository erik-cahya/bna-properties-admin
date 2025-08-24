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

    public function show($id)
    {
        $customer = CustomerModel::findOrFail($id);
        return view('admin.customer.show', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customer.index')->with('success', 'Customer deleted successfully');
    }
}

