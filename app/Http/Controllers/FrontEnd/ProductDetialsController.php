<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use Illuminate\Http\Request;

class ProductDetialsController extends Controller
{
    public function productDetails($slug)
    {
        $products = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('status', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();
        return view('front-end.product.product-details',compact('products','relatedProducts'));
    }
}

