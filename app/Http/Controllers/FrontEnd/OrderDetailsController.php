<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class OrderDetailsController extends Controller
{
    public function checkoutDetails($checkout)
    {
        $products = Product::where('slug', $checkout)->firstOrFail();
        return view('front-end.order.checkout-details', compact('products'));

    }

    public function orderProduct(Request $request)
    {
        // Check if 'customer_name' is provided
        // Alert::success('success','Order ');
        // if (!$request->has('customer_name') || empty($request->customer_name)) {
        //     return redirect()->back();
        // }

        // Rest of your code remains unchanged
        // $user = User::create([
        //     "name" => $request->customer_name,
        //     "phone" => $request->customer_phone,
        //     "username" => $request->customer_name,
        //     "email" => 'customer@gmail.com',
        //     "address" => $request->customer_address,
        //     "password" => Hash::make('1234567'),
        // ]);

        
    // Check if 'customer_name' is provided
    Alert::success('success', 'Order ');
    if (!$request->has('customer_name') || empty($request->customer_name)) {
        return redirect()->back();
    }
    
    // Check if the user is logged in
    if (auth()->check()) {
        $user = auth()->user();
    } else {
        // Create a new user if not logged in
        $user = User::create([
            "name" => $request->customer_name,
            "phone" => $request->customer_phone,
            "username" => $request->customer_name,
            "email" => 'customer@gmail.com',
            "address" => $request->customer_address,
            "password" => Hash::make('1234567'),
        ]);
    }

        $orderPrefix = 'REG';
        // $totalOrderProductPrice = $request->total_quantity * $request->price;
        $totalOrderProductPrice = $request->total_quantity  * $request->price - $request->discount_amount;
        $totalOrderProductQuantity = $request->total_quantity;
        $discountAmount = $request->total_quantity * $request->discount_amount;

        $product_shipping = Product::find($request->product_id);
        $shipping_amount = 0;
        if ($request->delivery_area=='inside_dhaka') {
            $shipping_amount =$product_shipping->inside_dhaka;

        }elseif($request->delivery_area=='outside_dhaka') {
            $shipping_amount =$product_shipping->outside_dhaka;

        }
        $totalOrderProductPrice += $shipping_amount;


        $shipping_charge = Product::find($request->product_id);
        if ($request->delivery_area == "inside_dhaka") {
            $deliveryCharge = $shipping_charge->inside_dhaka;
        } else {
            $deliveryCharge = $shipping_charge->outside_dhaka;
        }

        $orderDetails = Order::create([
            "order_prefix" => $orderPrefix,
            "order_code" => rand(11111, 99999),
            "user_id" => $user->id,
            "customer_name" => $user->name,
            "customer_phone" => $user->phone,
            "customer_email" => $user->email,
            "customer_address" => $user->address,
            // "payment_status	" => 1,
            "status" => 1,
            "total_amount" => $totalOrderProductPrice,
            "total_quantity" => $totalOrderProductQuantity,
            "delivery_area" => $deliveryCharge,
            "discount_amount" => $discountAmount,
        ]);

        $product = Product::find($request->product_id);
        OrderProduct::create([
            "order_id" => $orderDetails->id,
            "product_id" => $product->id,
            "product_name" => $product->title,
            "photo" => $product->photo,
            "quantity" => $orderDetails->total_quantity,
            "unit_price" => $request->price,
        ]);

        Alert::success('Success', "Thank You For Your Order");
        return redirect()->route('invoice_order', $orderDetails->id);
    }

    // function to order invoice
    public function invoiceOrder($id) {
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        return view('front-end.invoice.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }
}
