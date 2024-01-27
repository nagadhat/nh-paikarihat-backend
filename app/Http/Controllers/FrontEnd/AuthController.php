<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

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
    public function registeredUser(StoreRegisterRequest $request) {
        $request->validate();
        $user = new User();
        $user->username   = $request->firstname . ' ' . $request->lastname;
        $user->name       = $request->firstname;
        $user->phone      = $request->phone;
        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);
        $res= $user->save();
        if ($res) {
           return redirect()->back()->with('success','you have registared successfuly!!');
        } else {
            return redirect()->back()->with('fail','Something Wrong');

        }


    }
}
