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
        $totalProductsCount = Product::count();
        $categories = Category::where('status', 1)->latest()->get();
        if ($request->ajax()) {
            return view('front-end.home.all-product', compact('products', 'totalProductsCount'));
        }
        return view('front-end.home.home-page', compact('products', 'categories', 'totalProductsCount'));
    }

    public function homePageAllProduct(Request $request)
    {
        $products = Product::latest()->paginate(15);
        $categories = Category::where('status', 1)->latest()->get();
        if ($request->ajax()) {
            return view('front-end.home.all-product', compact('products'));
        }
        return view('front-end.home.home-page', compact('products', 'categories'));
    }

    public function showCategoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->where('status', 1)->firstOrFail();
        $categories = Category::where('status', 1)->latest()->get();
        $products = $category->products()->get();
        return view('front-end.home.category-product', compact('products', 'category', 'categories'));
    }

    public function loadMoreProducts(Request $request)
    {
        $page = $request->get('page');
        $products = Product::skip(($page - 1) * 15)->take(15)->get();
        return view('front-end.home.home-page')->with('products', $products);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where(function ($queryBuilder) use ($query) {
            $lowercaseQuery = mb_strtolower($query);
            $queryBuilder->whereRaw('LOWER(title) LIKE ?', ['%' . $lowercaseQuery . '%'])
                ->orWhere('sku', 'like', '%' . $query . '%');
        })->get();
        $categories = Category::where('status', 1)->latest()->get();
        return view('front-end.home.search-product', compact('products','categories'));
    }
}
