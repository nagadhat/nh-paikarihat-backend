<?php

use App\Models\Product;
use App\Models\ProductCart;

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
        // $sessionId = $_SERVER['REMOTE_ADDR'];

        // $product_count = ProductCart::where('session_id', $sessionId)->count();
        // header cart icon quantity count
        $product_count = ProductCart::where('session_id', $sessionId)
            ->get()
            ->sum(function ($item) {
                return $item->quantity;
            });

        // $ipdaddress = $_SERVER['REMOTE_ADDR'];

        $product_count = ProductCart::where('session_id', $sessionId)
            ->get()
            ->sum(function ($item) {
                return $item->quantity;
            });
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
