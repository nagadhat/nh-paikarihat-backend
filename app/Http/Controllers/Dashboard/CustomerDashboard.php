<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class CustomerDashboard extends Controller
{
    // function to show dashbhoard
    public function index()
    {
        return view('admin.dashboard');
    }
}
