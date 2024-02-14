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
        $UserCount = User::count();
        $OrderCount = Order::count();
        $ProcessingOrder = Order::where('status', 3)->count();
        $DeliveredOrderCount = Order::where('status', 4)->count();
        return view('customer.dashboard', compact('OrderCount', 'ProcessingOrder','DeliveredOrderCount','UserCount'));
    }
}
