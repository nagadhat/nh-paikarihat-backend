<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class OrderDetailsController extends Controller
{
    public function checkoutDetails($checkout)
    {
        if (!Auth::check()) {
            Alert::error('Please Login First');
            return redirect()->route('customer_login');
        }
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $cartItems = ProductCart::where('user_id', $user_id)->with('product')->get();
        // $products = Product::where('slug', $checkout)->firstOrFail();
        $userdata = [
            'name' => $user->name,
            'phone' => $user->phone,
            'address' => $user->address,
        ];
        $totalprice = ProductCart::where('user_id', Auth::id())
            ->get()
            ->sum(function ($item) {
                return $item->unit_price * $item->quantity;
            });

        // $totaldiscount = ProductCart::where('user_id', $user_id)
        //     ->with('product')
        //     ->get()
        //     ->sum(function ($item) {
        //         return $item->product ? $item->product->discount_amount : 0;
        //     });
        
        $totaldiscount = ProductCart::where('user_id', $user_id)
            ->with('product')
            ->get()
            ->sum(function ($item) {
                if ($item->product) {
                    $discountPerItem = $item->product->discount_amount;
                    $quantity = $item->quantity;
                    return $discountPerItem * $quantity;
                } else {
                    return 0;
                }
            });

        return view('front-end.order.checkout-details', compact('cartItems', 'userdata', 'totalprice', 'totaldiscount'));
    }

    public function orderProduct(Request $request)
    {
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
        if ($request->delivery_area == 'inside_dhaka') {
            // $shipping_amount = $product_shipping->inside_dhaka;
            $shipping_amount = 60;
        } elseif ($request->delivery_area == 'outside_dhaka') {
            // $shipping_amount = $product_shipping->outside_dhaka;
            $shipping_amount = 120;
        }
        $totalOrderProductPrice += $shipping_amount;


        $shipping_charge = Product::find($request->product_id);
        if ($request->delivery_area == "inside_dhaka") {
            $deliveryCharge = 60;
            // $deliveryCharge = $shipping_charge->inside_dhaka;
        } else {
            // $deliveryCharge = $shipping_charge->outside_dhaka;
            $deliveryCharge = 120;
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
        $products = Product::whereIn('id', $request->product_id)->get();
        foreach ($products as $product) {
            $lineItem = ProductCart::where('product_id', $product->id)->first();
            OrderProduct::create([
                "order_id" => $orderDetails->id,
                "product_id" => $product->id,
                "product_name" => $product->title,
                "photo" => $product->photo,
                "quantity" => $lineItem->quantity,
                "unit_price" => $lineItem->unit_price,
            ]);
        }
        // $product = Product::find($request->product_id);


        Alert::success('Success', "Thank You For Your Order");
        return redirect()->route('invoice_order', $orderDetails->id);
    }

    // function to order invoice
    public function invoiceOrder($id)
    {
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        ProductCart::where('user_id', Auth::id())->delete();
        return view('front-end.invoice.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }
}
