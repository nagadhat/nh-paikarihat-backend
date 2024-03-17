<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function homePage()
    {
        $products = Product::latest()->limit(26)->get();
        // dd($products);
        return view('front-end.home.home-page', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $product_search = strtolower($request->input('productsearch'));
        $firstChar = substr($product_search, 0, 1);
        if (ctype_alpha($firstChar)) {
            $products = Product::whereRaw('LOWER(title) LIKE ?', ["%$product_search%"])
                ->latest()
                ->get();
        } elseif (is_numeric($firstChar)) {
            $products = Product::where('sku', 'LIKE', "$product_search%")
                ->latest()
                ->get();
        } else {
            $products = Product::where(function ($query) use ($product_search) {
                $query->whereRaw('LOWER(title) LIKE ?', ["%$product_search%"])
                    ->orWhere('sku', 'LIKE', "%$product_search%");
            })
                ->latest()
                ->get();
        }
        return view('front-end.home.home-page', compact('products'));
    }
}
