<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // function to get wireless car holder product
    public function showLandingPage()
    {
        $sku = "17857";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.show-landing-page', compact('product'));
    }

    // function to get light lamp product
    public function showLandingPageTwo()
    {
        $sku = "58551";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-two', compact('product'));
    }

    // function to get multifunctional charger product
    public function showLandingPageThree()
    {
        $sku = "91600";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-three', compact('product'));
    }

    // function to get portable charging power bank          
    public function showLandingPageFour()
    {
        $sku = "48028";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-four', compact('product'));
    }

    // function to get magnetic charging powerbank
    public function showLandingPageFive()
    {
        $sku = "80423";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-five', compact('product'));
    }

    // function to get magnetic charging powerbank
    public function showLandingPagesix()
    {
        $sku = "93686";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-six', compact('product'));
    }
     
    // function to get water bottle flux
    public function showLandingPageSev()
    {
        $sku = "64888";
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('front-end.landing.landing-page-seven', compact('product'));
    }

     // function to get water bottle flux
     public function showLandingPageEig()
     {
         $sku = "30601";
         $product = Product::where('sku', $sku)->firstOrFail();
         return view('front-end.landing.landing-page-eight', compact('product'));
     }


    public function orderLandingProduct (Request $request)
    {
        // Check if 'customer_name' is provided
        if (!$request->has('customer_name') || empty($request->customer_name)) {
            return redirect()->back();
        }
        if (!$request->has('customer_phone') || empty($request->customer_phone)) {
            return redirect()->back();
        }

        $user = User::create([
            "name" => $request->customer_name,
            "phone" => $request->customer_phone,
            "username" => $request->customer_name,
            "email" => 'customer@gmail.com',
            "address" => $request->customer_address,
            "password" => Hash::make('1234567'),
        ]);

        $orderPrefix = 'LPO';
        $totalOrderProductPrice = $request->total_quantity  * ($request->price - $request->discount_amount);
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
        return redirect()->route('landing_invoice_order', $orderDetails->id);
    }

    // function to order invoice
    public function LandinginvoiceOrder($id) 
    {
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        return view('front-end.invoice.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }
}


