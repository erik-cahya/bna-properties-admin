<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertiesModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data['dataProperties'] = PropertiesModel::get();
        return view('admin.dashboard.index', $data);
    }
}
