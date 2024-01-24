<?php

namespace App\Http\Controllers\Product;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('user_id', auth()->id())->get();

        if (isset($_GET['is_from']) && $_GET['is_from'] == 'vue') {
            // return response
            return response()->json([
                'brands' => $brands
            ]);
        } else {
            // return to brands
            return view('customer.product.brands', compact('brands'));
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
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:1000',
        ]);

        // check the brand is exist or not
        $brand = Brand::where('user_id', auth()->id())->where('title', $request->input('title'))->first();
        if (empty($brand)) {
            // create brand
            $brand = new Brand();
            $brand->user_id = auth()->id();
            $brand->title = $request->input('title');

            if ($request->hasFile('logo')) {
                $request->file('logo')->store('public/categories');
                $path = 'categories/' . $request->file('logo')->hashName();

                $brand->logo = $path;
            }

            $brand->slug = Str::slug($request->input('title'), '-');
            $brand->description = $request->input('description');
            $brand->save();

            // Alert
            toast('Brand created successfully.', 'success');
        } else {
            toast('The brand is already exist.', 'info');
        }

        // check the request is from vue or not
        if ($request->input('is_from') && $request->input('is_from') == 'vue') {
            $brands = Brand::where('user_id', auth()->id())->get();

            // return response
            return response()->json([
                'brands' => $brands,
            ]);
        } else {
            // return to brands
            return redirect()->route('brands.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        // data validation
        $request->validate([
            'title' => 'required',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:1000',
        ]);

        // update brand
        $brand->title = $request->input('title');

        if ($request->hasFile('logo')) {
            $request->file('logo')->store('public/categories');
            $path = 'categories/' . $request->file('logo')->hashName();

            $brand->logo = $path;
        }

        $brand->slug = Str::slug($request->input('title'), '-');
        $brand->description = $request->input('description');
        $brand->save();

        // return to brands
        toast('The brand is updated successfully.', 'success');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // delete brand
        $brand->delete();

        // return back
        toast('The brand is deleted successfully.', 'success');
        return redirect()->back();
    }
}
