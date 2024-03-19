<?php

namespace App\Http\Controllers\Product;

use Illuminate\Pagination\Paginator;
use App\Models\Product;
use App\Models\ProductView;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // function to show product page list
    public function index()
    {
        // Paginator::useBootstrap();
        $products = Product::orderBy('id', 'desc')->get();
        return view('customer.product.products', compact('products'));
    }

    // function to show add product page
    public function create()
    {
        $categories = Category::all();
        return view('customer.product.create-product', compact('categories'));
    }

    // function to add product
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'title' => 'required',
            'photo' => 'required|max:1000',
            // 'photo' => 'required|mimes:png,jpg,jpeg|max:1000',
            'sku' => 'required|numeric',
            'price' => 'required|numeric',
            'product_type' => 'required',
            'purchase_amount' => 'required|numeric',
            'quantity' => 'integer|min:1',
            // 'brand' => 'nullable|exists:brands,id',
            'category' => 'required|exists:categories,id'
        ]);

        // create product
        $product = new Product();
        $product->user_id = auth()->id();
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->sku = $request->input('sku');
        $product->price = $request->input('price');
        $product->product_type = $request->input('product_type');
        $product->purchase_amount = $request->input('purchase_amount');
        $product->brand_id = $request->input('brand');
        $product->category_id = $request->input('category');
        $product->quantity = $request->input('min_quantity');
        $product->max_quantity = $request->input('max_quantity') ?? 0;
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->inside_dhaka = $request->input('inside_dhaka');
        $product->outside_dhaka = $request->input('outside_dhaka');

        // Single photo added
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = $photo->getClientOriginalName();
            $photo->move(public_path('storage/products/'), $originalName);
            $product->photo = $originalName;
        }

        // Multiple photos added
        if ($request->hasFile('multiple_photo')) {
            $multiple_photos = $request->file('multiple_photo');
            $paths = [];

            foreach ($multiple_photos as $photo) {
                $originalName = $photo->getClientOriginalName();
                $path = 'storage/products/multipleimage/' . $originalName;
                $photo->move(public_path('storage/products/multipleimage/'), $originalName);
                $paths[] = $path;
            }

            $product->multiple_photo = implode(',', $paths);
        }

        $product->save();

        // return back
        toast('Product created successfully.', 'success');
        return redirect()->route('products.index');
    }


    // function to edit category and brand
    public function edit(Product $product)
    {
        $categories = Category::where('user_id', auth()->id())->where('status', 1)->get();
        // dd($categories);
        $brands = Brand::where('user_id', auth()->id())->where('status', 1)->get();

        return view('customer.product.edit-product', compact('product', 'categories', 'brands'));
    }

    // function to update product
    public function update(Request $request, Product $product)
    {
        // data validation
        $request->validate([
            'title' => 'required',
            'photo' => 'nullable|max:1000',
            'sku' => 'required',
            'price' => 'required|numeric',
            'product_type' => 'required',
            'purchase_amount' => 'required|numeric',
            'quantity' => 'integer|min:1',
            // 'brand' => 'nullable|exists:brands,id',
            'category' => 'required|exists:categories,id'
        ]);

        // create product
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->sku = $request->input('sku');
        $product->price = $request->input('price');
        $product->product_type = $request->input('product_type');
        $product->purchase_amount = $request->input('purchase_amount');
        $product->brand_id = $request->input('brand');
        $product->category_id = $request->input('category');
        $product->discount_type = $request->input('discount_type');
        $product->discount_amount = $request->input('discount_amount');
        $product->quantity = $request->input('min_quantity');
        $product->max_quantity = $request->input('max_quantity') ?? 0;
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->inside_dhaka = $request->input('inside_dhaka');
        $product->outside_dhaka = $request->input('outside_dhaka');

        // update single image
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $newName = $originalName . '_' . time() . '.' . $extension;
            $photo->move(public_path('storage/products/'), $newName);
            if ($product->photo) {
                $oldPhotoPath = public_path('storage/products/') . $product->photo;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $product->photo = $newName;
        }

        // update multiple image
        // $this->validate($request, [
        //     'multiple_photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        // ]);
        if ($request->hasFile('multiple_photo')) {
            $multiple_photos = $request->file('multiple_photo');
            $paths = [];
            foreach ($multiple_photos as $photo) {
                $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $fileName = $originalName . '_' . time() . '.' . $extension;
                $path = $photo->move(public_path('storage/products/multipleimage/'), $fileName);
                $paths[] = 'storage/products/multipleimage/' . $fileName;
            }
            $product->multiple_photo = implode(',', $paths);
        }

        $product->save();

        // return back
        toast('Product updated successfully.', 'success');
        return redirect()->route('products.index');
    }

    // function to delete product
    public function destroy(Product $product)
    {
        $product->delete();

        // return back
        toast('Product deleted successfully.', 'success');
        return redirect()->route('products.index');
    }
}
