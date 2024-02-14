<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Order;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function customerDashboard()
    {
        $user = Auth::user();
        $CustomerProductCount = Order::where('user_id', $user->id)->count();
        $CustomerCartCount = ProductCart::where('user_id', $user->id)->count();
        $ProcessingProductCount = Order::where('user_id', $user->id)
                ->where('status', 3)
                ->count();
        $DeliveredProductCount = Order::where('user_id', $user->id)
                ->where('status', 4)
                ->count();
        return view('front-end.dashboard.customer-dashboard', compact('CustomerProductCount', 'CustomerCartCount', 'DeliveredProductCount', 'ProcessingProductCount')); 
    }
}
