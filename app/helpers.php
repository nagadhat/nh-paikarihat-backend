<?php

use App\Models\Product;

if(!function_exists("getDiscountByProductId")){
    function getDiscountByProductId($product_id) {

        $product_info = Product::select('discount_amount')->where("id",$product_id)->first();
        return $product_info->discount_amount;
    }
}
?>
