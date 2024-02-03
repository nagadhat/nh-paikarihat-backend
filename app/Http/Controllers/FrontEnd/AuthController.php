<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user->address       = $request->address;
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
    public function logoutCustomer()
    {
        Auth::logout();
        return to_route('home_page');
    }

    // function to profile update
    public function profileUpdate()
    {
        $user = User::find(auth()->id());
        return view('front-end.auth.customer-profile-update', compact('user'));
    }

    // function to profile update Save
    public function profileSave(UpdateCustomerProfileRequest $request)
    {
        $user = User::find(auth()->id());
        $request->validated();
        if ($user) {
            $user->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'address' => $request->address,
            ]);
        }
        Alert::success('Profile Update Successfuly');
        return redirect()->back();
    }

    // function to Customer Password
    public function customerPassword()
    {
        return view('front-end.auth.customer-password-change');
    }

    // function to Customer Password Update
    public function customerPasswordUpdate(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        if (!Hash::check($request->input('current_password'), $user->password)) {
            Alert::error('Please Enter Your Old Password');
            return redirect()->back();
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed|different:current_password',
            'new_password_confirmation' => 'required|same:new_password|min:8'
        ]);

        if (strcmp($request->input('current_password'), $request->input('new_password')) == 0) {
            Alert::error('New Password should be different from the current password');
            return redirect()->back();
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);
        Alert::success('Password Update Successfuly!!!');
        return redirect()->back();
    }
}
