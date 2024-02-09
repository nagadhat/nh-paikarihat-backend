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

    public function searchProduct(Request $request)
    {
        $product_search = $request->input('productsearch');
    
        // Check if the search query starts with a letter or number
        $firstChar = substr($product_search, 0, 1);
        if (ctype_alpha($firstChar)) {
            // Search by title if the first character is a letter
            $products = Product::where('title', 'LIKE', "$product_search%")
                ->latest()
                ->get();
        } elseif (is_numeric($firstChar)) {
            // Search by SKU if the first character is a number
            $products = Product::where('sku', 'LIKE', "$product_search%")
                ->latest()
                ->get();
        } else {
            // Default search by both title and SKU
            $products = Product::where(function($query) use ($product_search) {
                    $query->where('title', 'LIKE', "%$product_search%")
                    ->orWhere('sku', 'LIKE', "%$product_search%");
                })
                ->latest() 
                ->get();
        }
        return view('front-end.home.home-page', compact('products'));
    }
    
    
}
