<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderEditUser;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class OrderDetailsController extends Controller
{
    public function checkoutDetails($checkout, $product_count=0)
    {

        $sessionId = isset($_GET['sessionId']) ? $_GET['sessionId'] : 0;
        $product_count = isset($_GET['product_count']) ? $_GET['product_count'] : 0;

        $user = Auth::user();
        $user_id = Auth::user()->id ?? null;

       if($user_id && $sessionId){
            ProductCart::where('session_id',$sessionId )
            ->update(['user_id' => $user_id]);
        }
        $cartItems = ProductCart::Where('user_id', $user_id)->with('product')->get();
        $userdata = [];
        if($user_id){
            $userdata = [
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
            ];
       }
        $totalprice = ProductCart::Where('user_id', $user_id)
            ->get()
            ->sum(function ($item) {
                return $item->unit_price * $item->quantity;
            });

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

        return view('front-end.order.checkout-details', compact('cartItems', 'userdata', 'totalprice', 'totaldiscount', 'product_count'));
    }

    public function orderProduct(Request $request)
    {

        $sessionId = session()->getId();
        //  $sessionId = $_SERVER['REMOTE_ADDR'];
        Alert::success('success', 'Order ');
        if (!$request->has('customer_name') || empty($request->customer_name)) {
            return redirect()->back();
        }

        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::create([
                "name" => $request->customer_name,
                "phone" => $request->customer_phone,
                "username" => $request->customer_name,
                "email" => 'customer@gmail.com',
                "address" => $request->customer_address,
                "password" => Hash::make('1234567'),
            ]);
        }

        $products = Product::where('id', $request->product_id)->first();
        $totalOrderProductPrice = $request->total_quantity  * $request->price - $request->discount_amount;
        $shipping_amount = 0;
        $totalOrderProductPrice += $shipping_amount;
        if ($request->delivery_area == "inside_dhaka") {
            $deliveryCharge = 60;
        } else {
            $deliveryCharge = 120;
        }

        $orderDetails = Order::create([
            "order_prefix" => $products->product_type,
            "order_code" => rand(11111, 99999),
            'session_id' => $sessionId,
            "user_id" => $user->id ?? null,
            "customer_name" => $request->customer_name ?? $user->name,
            "customer_phone" => $request->customer_phone ?? $user->phone,
            "customer_email" => $request->customer_email ?? $user->email,
            "customer_address" => $request->customer_address ?? $user->address,
            "status" => 1,
            "total_amount" => $request->price,
            "total_quantity" => count($request->product_id),
            "delivery_area" => $deliveryCharge,
            "discount_amount" => $request->discount_amount,
        ]);

        $products = Product::whereIn('id', $request->product_id)->get();
        foreach ($products as $product) {
            $lineItem = ProductCart::where('product_id', $product->id)->first();
            OrderProduct::create([
                "order_id" => $orderDetails->id,
                "product_id" => $product->id,
                'session_id' => $sessionId,
                "product_name" => $product->title,
                "photo" => $product->photo,
                "quantity" => $lineItem->quantity,
                "unit_price" => $lineItem->unit_price,
            ]);
        }

        OrderEditUser::create([
            "user_id" => $user->id ?? null,
            "order_id" => $orderDetails->id,
            "customer_name" => $orderDetails->customer_name,
            "customer_phone" => $orderDetails->customer_phone,
            "customer_address" => $orderDetails->customer_address,
            "customer_email" => $orderDetails->customer_email,
        ]);

        Alert::success('Success', "Thank You For Your Order");
        return redirect()->route('invoice_order', $orderDetails->id);
    }

    // function to order invoice
    public function invoiceOrder($id)
    {
       $sessionId = session()->getId();
        //  $sessionId = $_SERVER['REMOTE_ADDR'];
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        ProductCart::where('session_id', $sessionId)->orWhere('user_id',Auth::id())->delete();
        return view('front-end.invoice.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }
}
