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
        return view('front-end.home.home-page', compact('products'));
    }

    public function searchProduct(Request $request)
    {
<<<<<<< Updated upstream
        $product_search = strtolower($request->input('productsearch'));
=======
        $product_search = $request->input('productsearch');

        // Check if the search query starts with a letter or number
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            $products = Product::where(function ($query) use ($product_search) {
                $query->whereRaw('LOWER(title) LIKE ?', ["%$product_search%"])
                    ->orWhere('sku', 'LIKE', "%$product_search%");
            })
=======
            // Default search by both title and SKU
            $products = Product::where(function($query) use ($product_search) {
                    $query->whereRaw('LOWER(title) LIKE ?', ["%".strtolower($product_search)."%"])
                    ->orWhere('sku', 'LIKE', "%".$product_search."%");
                })
>>>>>>> Stashed changes
                ->latest()
                ->get();
        }
        return view('front-end.home.home-page', compact('products'));
    }
<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
}
