<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    // Store Register Customer Information
    public function registeredUser(StoreRegisterRequest $request) {
        $request->validated();
        $user = new User();
        $user->username   = $request->phone;
        $user->name       = $request->firstname . ' ' . $request->lastname ;
        $user->phone      = $request->phone;
        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);
        $res =$user->save();
        if ($res) {
           return redirect()->back()->with('success','you have registared successfuly!!');
        } else {
            return redirect()->back()->with('fail','Something Wrong');
        }
    }
//  Resgister User Login
    public function loginCustomer(StoreLoginRequest $request) {
        $request->validated();
        $customerAuth = $request->only('phone','password');
        if (Auth::attempt($customerAuth,true)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    }

}
