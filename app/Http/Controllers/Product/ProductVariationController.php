<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{

    // function to show product variation page list
    public function index()
    {
        $variations = ProductVariation::where('user_id', auth()->id())->get();
        return view('customer.product.variation.variations', compact('variations'));
    }

    // funtion to create product variation
    public function create(Request $request)
    {
        // check method
        if ($request->isMethod('POST')) {
            // validation
            // $request->validate([
            //     'price' => 'required|numeric',
            //     'quantity' => 'required|integer',
            //     'product_id' => 'required|integer',
            // ]);

            if ($request->size[0] != null && $request->color[0] != null && $request->weight[0] != null) {
                return redirect()->back()->with([
                    'message' => 'Follow the variant rules'
                ]);
            } elseif ($request->size[0] != null && $request->weight[0] != null || $request->color[0] != null && $request->weight[0] != null) {
                return redirect()->back()->with([
                    'message' => 'Follow the variant rules'
                ]);
            }


            // create variation
            $productVariation = New ProductVariation();
            $productVariation->user_id = auth()->id();
            $productVariation->product_id = $request->product_id;
            $productVariation->price = json_encode($request->price);
            $productVariation->quantity = json_encode($request->quantity);
            $productVariation->size = ($request->size[0] != null) ? json_encode($request->size) : null;
            $productVariation->color = ($request->color[0] != null) ? json_encode($request->color) : null;
            $productVariation->weight = ($request->weight[0] != null) ? json_encode($request->weight) : null;
            $productVariation->save();

            // update product
            $product = Product::find($request->product_id);
            $product->is_variation = 1;
            $product->save();

            toast('variation created successfully.', 'success');
            return redirect()->route('product_variations');
        } else {
            $products = Product::where('user_id', auth()->id())->get();
            return view('customer.product.variation.create-variation', compact('products'));
        }
    }


    // function for update product variation
    public function update(Request $request, $id)
    {
        // check method
        if ($request->isMethod('POST')) {
            // validation
            // $request->validate([
            //     'price' => 'required|numeric',
            //     'quantity' => 'required|integer',
            //     'product_id' => 'required|integer',
            // ]);

            if ($request->size[0] != null && $request->color[0] != null && $request->weight[0] != null) {
                return redirect()->back()->with([
                    'message' => 'Follow the variant rules'
                ]);
            } elseif ($request->size[0] != null && $request->weight[0] != null || $request->color[0] != null && $request->weight[0] != null) {
                return redirect()->back()->with([
                    'message' => 'Follow the variant rules'
                ]);
            }

            //update product variation
            $productVariation = ProductVariation::find($id);
            $productVariation->price = json_encode($request->price);
            $productVariation->quantity = json_encode($request->quantity);
            $productVariation->size = ($request->size[0] != null) ? json_encode($request->size) : null;
            $productVariation->color = ($request->color[0] != null) ? json_encode($request->color) : null;
            $productVariation->weight = ($request->weight[0] != null) ? json_encode($request->weight) : null;
            $productVariation->save();

            toast('variation updated successfully.', 'success');
            return redirect()->route('product_variations');
        } else {
            $products = Product::where('user_id', auth()->id())->get();
            $variations = ProductVariation::find($id);

            if (isset($_GET['is_from']) && $_GET['is_from'] == 'vue') {
                return response()->json([
                    'variations' => $variations
                ]);
            } else {
                return view('customer.product.variation.edit-variation', compact('variations', 'products'));
            }
        }
    }

    // function for delete product variation
    public function destroy($id)
    {
        $variation = ProductVariation::find($id);
        if ($variation->count() == 1) {
            // update product
            $product = Product::find($variation->product_id);
            $product->is_variation = 0;
            $product->save();
        }

        // delete variation
        $variation->delete();

        toast('variation deleted successfully.', 'success');
        return redirect()->back();
    }
}
