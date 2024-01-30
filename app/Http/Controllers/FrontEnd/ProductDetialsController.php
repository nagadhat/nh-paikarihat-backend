<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductDetialsController extends Controller
{
    public function productDetails($slug)
    {

        $products = Product::where('slug', $slug)->firstOrFail();

        $recentlyViewed = Session::get('recentlyViewed', []);
        $recentlyViewed = array_diff($recentlyViewed, [$products->id]);
        array_unshift($recentlyViewed, $products->id);
        $recentlyViewed = array_slice($recentlyViewed, 0, 5);
        Session::put('recentlyViewed', $recentlyViewed);
        $recentlyViewedProducts = Product::whereIn('id', $recentlyViewed)->get();

        $relatedProducts = Product::where('status', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('front-end.product.product-details', compact('products', 'recentlyViewedProducts', 'relatedProducts'));
    }
}

