<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    // function to show admin dashboard
    public function index()
    {
        $UserCount = User::count();
        $OrderCount = Order::count();
        $PendingOrder = Order::where('status', 1)->count();
        $ProcessingOrder = Order::where('status', 3)->count();
        $DeliveredOrderCount = Order::where('status', 4)->count();
        return view('admin.dashboard', compact('PendingOrder','OrderCount', 'ProcessingOrder','DeliveredOrderCount','UserCount'));
        // return view('admin.dashboard');
    }
    
}
