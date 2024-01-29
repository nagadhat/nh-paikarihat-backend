<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Customer Login Page
    public function login()
    {
        return view('front-end.auth.login');
    }

    // Customer Register Page
    public function register()
    {
        return view('front-end.auth.register');
    }

    // Store Register Customer Information
    public function registeredUser(StoreRegisterRequest $request)
    {
        $request->validated();
        $user = new User();
        $user->username    = $request->phone;
        $user->name        = $request->firstname . ' ' . $request->lastname;
        $user->phone       = $request->phone;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
        $user->user_type   = 'customer';
        $res = $user->save();
        if ($res) {
            Alert::success("Registared Successfuly!!");
            return redirect()->route('customer_login');
        } else {
            Alert::error("Somthing Wrong!!");
            return redirect()->back();
        }
    }

    //  Resgister User Login
    public function loginCustomer(StoreLoginRequest $request)
    {
        $request->validated();
        $customerAuth = $request->only('phone', 'password');
        if (Auth::attempt($customerAuth, true)) {
            $request->session()->regenerate();
            Alert::success("Logging Successfuly!!");
            return redirect()->route('customer_dashboard');
        } else {
            Alert::error("Invalid Phone & Password");
            return redirect()->back();
        }
    }

    //  Function to logout Customer
    public function logoutCustomer() {
        Auth::logout();
        return to_route('home_page');
    }

    // function to profile update
    public function profileUpdate()
    {
        return view('front-end.auth.customer-profile-update');
    }
}
