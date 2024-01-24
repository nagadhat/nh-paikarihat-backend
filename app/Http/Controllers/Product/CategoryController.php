<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->get();

        if (isset($_GET['is_from']) && $_GET['is_from'] == 'vue') {
            // return response
            return response()->json([
                'categories' => $categories
            ]);
        } else {
            // return to categories
            return view('customer.product.categories', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'title' => 'required',
        ]);

        // check the category is exist or not
        $category = Category::where('user_id', auth()->id())->where('title', $request->input('title'))->first();
        if (empty($category)) {
            // create category
            $category = new Category();
            $category->user_id = auth()->id();
            $category->title = $request->input('title');

            $category->slug = Str::slug($request->input('title'), '-');
            $category->description = $request->input('description');
            $category->save();

            // Alert
            toast('Category created successfully.', 'success');
        } else {
            toast('The category is already exist.', 'info');
        }

        if (isset($request->is_from) && $request->is_from == 'vue') {
            $categories = Category::where('user_id', auth()->id())->get();

            // return response
            return response()->json([
                'categories' => $categories
            ]);
        } else {
            // return to brands
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // data validation
        $request->validate([
            'title' => 'required',
        ]);

        // update brand
        $category->title = $request->input('title');
        $category->slug = Str::slug($request->input('title'), '-');
        $category->description = $request->input('description');
        $category->save();

        // return to brands
        toast('The category is updated successfully.', 'success');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // delete brand
        $category->delete();

        // return back
        toast('The category is deleted successfully.', 'success');
        return redirect()->back();
    }
}
