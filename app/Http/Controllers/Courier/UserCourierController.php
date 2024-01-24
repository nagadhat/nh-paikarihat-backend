<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Models\UserCourier;
use App\Models\Courier;
use Illuminate\Http\Request;

class UserCourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // function to show customer courier page
        $couriers = Courier::all();
        return view('customer.courier.a-couriers', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // function to update and create customer courier
        $updateCourier = UserCourier::where('user_id', auth()->id())->first();
        $request->validate([
            'api_key' => 'required',
            'api_secret' => 'required',
        ]);

        $api = [$request->input('api_key'), $request->input('api_secret')];

        if ($updateCourier) {
            $updateCourier->update([
                'api' => $api,
            ]);
        } else {
            $newCourier = new UserCourier();
            $newCourier->user_id = auth()->id();
            $newCourier->courier_id = $request->input('courier_id');
            $newCourier->api = $api;
            $newCourier->save();
        }

        // return to customer couriers
        toast('Courier updated successfully.', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCourier $userCourier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCourier $userCourier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserCourier $userCourier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCourier $userCourier)
    {
        //
    }
}
