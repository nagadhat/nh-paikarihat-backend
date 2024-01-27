<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('front-end.auth.login');
    }
    public function register()
    {
        return view('front-end.auth.register');
    }
}
