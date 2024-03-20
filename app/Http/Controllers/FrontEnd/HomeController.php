<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Product;

class HomeController extends Controller
{
    public function homePage(Request $request)
    {
        $products = Product::latest()->paginate(15);
        $totalProductsCount = Product::count(); // Get the total count of products
        $categories = Category::where('status', 1)->latest()->get();

        if ($request->ajax()) {
            return view('front-end.home.all-product', compact('products', 'totalProductsCount'));
        }
        return view('front-end.home.home-page', compact('products', 'categories', 'totalProductsCount'));
    }
    public function homePageAllProduct(Request $request) {
        $products = Product::latest()->paginate(15);
        $categories = Category::where('status', 1)->latest()->get();
        if ($request->ajax()) {
            return view('front-end.home.all-product', compact('products'));
        }
        return view('front-end.home.home-page', compact('products', 'categories'));
    }

    public function showCategoryProducts(Category $category)
    {
        $categories = Category::where('status', 1)->latest()->get();
        $products = $category->products()->get();
        return view('front-end.home.category-product', compact('products', 'category','categories'));
    }

    public function loadMoreProducts(Request $request)
    {
        $page = $request->get('page');
        $products = Product::skip(($page - 1) * 15)->take(15)->get();
        return view('front-end.home.home-page')->with('products', $products);
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
