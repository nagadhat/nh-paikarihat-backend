<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\OrderReturnRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;

class OrderReturnController extends Controller
{
    // function to show order return request page
    public function customerOrderReturn()
    {
        return view('front-end.order.customer-order-return');
    }

    // function to send order return request
    public function OrderReturnRequest(Request $request) 
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'product_name' => 'required',
            'total_quantity' => 'required',
            'total_amount' => 'required',
            'order_code' => 'required',
            'order_date' => 'required',
        ]);

        $orderDetails = OrderReturnRequest::create([
            "user_id" => auth()->user()->id,
            "customer_name" => $validatedData['customer_name'],
            "customer_email" => $request->customer_email,
            "customer_phone" => $validatedData['customer_phone'],
            "product_name" => $validatedData['product_name'],
            "total_quantity" => $validatedData['total_quantity'],
            "total_amount" => $validatedData['total_amount'],
            "order_code" => $validatedData['order_code'],
            "order_date" => $validatedData['order_date'],
            "return_reason" => $request->return_reason,
        ]);

        $orderDetails->save();
        Alert::success('Order Return Request Succesfully');
        return redirect()->route('customer_dashboard');
    }

    public function OrderReturnDetails()
    {
        Paginator::useBootstrap();
        $user= auth()->user();
        $orderReturn = OrderReturnRequest::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('front-end.order.order-return-details', compact('orderReturn'));
    }

}
