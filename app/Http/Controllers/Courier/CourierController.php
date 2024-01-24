<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // function to show admin courier page
        $couriers = Courier::all();
        return view('admin.courier.couriers', compact('couriers'));
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
        // data validation
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:1000',
        ]);

        // create couriwe
        $courier = new Courier();
        $courier->name = $request->input('name');
        if ($request->hasFile('logo')) {
            $request->file('logo')->store('public/couriers');
            $path = 'couriers/' . $request->file('logo')->hashName();
            $courier->logo = $path;
        }

        $courier->save();

        // Alert
        toast('Courier created successfully.', 'success');

        // return to admin coueriers
        return redirect()->route('couriers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courier $courier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // data validation
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:1000',
        ]);

        // update courier
        $courier = Courier::find($id);
        $courier->name = $request->input('name');
        if ($request->hasFile('logo')) {
            $request->file('logo')->store('public/couriers');
            $path = 'couriers/' . $request->file('logo')->hashName();
            $courier->logo = $path;
        }

        $courier->save();

        // Alert
        toast('Courier update successfully.', 'success');

        // return to couerers
        return redirect()->route('couriers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        //
    }

    // function to change courier status
    public function status($id, $status)
    {
        $courier = Courier::find($id);
        $courier->status = $status;
        $courier->save();

        // return back
        return redirect()->back();
    }
}
