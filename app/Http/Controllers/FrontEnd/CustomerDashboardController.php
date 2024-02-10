<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function customerDashboard()
    {
        //dd($product_count);
        return view('front-end.dashboard.customer-dashboard');
    }
}
