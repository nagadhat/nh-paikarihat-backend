<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function homePage()
    {
        $products = Product::latest()->limit(20)->get();
        // dd($products);
        return view('front-end.home.home-page',compact('products'));
    }
    public function searchProduct(Request $request) {
        $product_search =  $request->productsearch;
        $products = Product::where('title','LIKE',"%$product_search%")
        ->orWhere('sku','LIKE',"%$product_search%")
        ->latest()->limit(20)->get();
        return view('front-end.home.home-page',compact('products'));
    }
}
