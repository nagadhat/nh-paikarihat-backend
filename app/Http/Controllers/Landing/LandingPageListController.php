<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageListController extends Controller
{
    public function landingPageList()
    {
        return view('customer.landing.landing-page-list');
    }
}
