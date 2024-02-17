<?php

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Support\Facades\Auth;

if (!function_exists("getDiscountByProductId")) {
    function getDiscountByProductId($product_id)
    {

        $product_info = Product::select('discount_amount')->where("id", $product_id)->first();
        return $product_info->discount_amount;
    }
}
if (!function_exists("product_count")) {
    function product_count()
    {
        $sessionId = session()->getId();

        if (Auth::check()) {
            $product_count = ProductCart::where('user_id', Auth()->user()->id)
                ->get()
                ->sum(function ($item) {
                    return $item->quantity;
                });
        }else{
            $product_count = ProductCart::where('session_id', $sessionId)
                ->get()
                ->sum(function ($item) {
                    return $item->quantity;
                });
        }
        return $product_count ? $product_count : 0;
    }
}

if (!function_exists("user_info")) {
    function user_info()
    {
        $user = auth()->user();
        return $user;
    }
}
