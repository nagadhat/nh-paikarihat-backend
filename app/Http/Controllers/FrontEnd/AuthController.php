<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;
use App\Models\ProductCart;
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

        // Check if the phone number or email already exist
        $existingUser = User::where('phone', $request->phone)
            ->orWhere('email', $request->email)
            ->first();

        if ($existingUser) {
            Alert::error("Phone number or email already exists!");
            return redirect()->back();
        }

        // If the phone number and email are unique, proceed to create the new user
        $user = new User();
        $user->username    = $request->phone;
        $user->name        = $request->firstname . ' ' . $request->lastname;
        $user->phone       = $request->phone;
        $user->email       = $request->email;
        $user->address     = $request->address;
        $user->password    = bcrypt($request->password);
        $user->user_type   = 'public';

        $res = $user->save();

        if ($res) {
            Alert::success("Registered Successfully!!");
            return redirect()->route('customer_login');
        } else {
            Alert::error("Something Wrong!!");
            return redirect()->back();
        }
    }

    //  Resgister User Login
    public function loginCustomer(StoreLoginRequest $request)
    {
        $request->validated();
        $customerAuth = $request->only('phone', 'password');
        $product_count = 0;

        if (Auth::attempt($customerAuth, true)) {

            // $sessionId = session()->getId();
            $sessionId = $_SERVER['REMOTE_ADDR'];
            $product_count = ProductCart::where('session_id', $sessionId)->count();

            Alert::success("Logging Successfuly!!");
            if ($product_count > 0) {
                return redirect()->route('checkout_details', ['checkout' => 'checkout', 'product_count' => $product_count]);
            }
            return redirect()->route('customer_dashboard');
        } else {
            Alert::error("Invalid Phone & Password");
            return redirect()->back();
        }
    }

    //  Function to logout Customer
    public function logoutCustomer()
    {
        ProductCart::where('user_id', Auth::id())->delete();
        Auth::logout();
        // Auth::guard('web')->logout();
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
            if ($request->hasFile('photo')) {
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    $originalName = $photo->getClientOriginalName();
                    $photo->move(public_path('storage/user-photo/'), $originalName);
                    $user->photo = 'storage/user-photo/' . $originalName;
                }
            }
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


    //  function to view forgot password page
    public function forgotPassword()
    {
        return view('front-end.auth.forgot-password');
    }

    public function forgotPasswordUpdate(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'new_password' => 'required|min:8|confirmed|different:current_password',
            'new_password_confirmation' => 'required|same:new_password|min:8'
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            Alert::error('Phone Number Not Found');
            return redirect()->back(); 
        }
        
        $user->update([
            'password' => bcrypt($request->new_password)
        ]);    

        Alert::success('Password updated successfully!');
        return view('front-end.auth.login');
    }
    
}
