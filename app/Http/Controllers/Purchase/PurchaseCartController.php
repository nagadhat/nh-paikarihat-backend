<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseCart;
use App\Models\PurchaseOrderProduct;
use Illuminate\Http\Request;

class PurchaseCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_items = PurchaseCart::leftJoin('products', 'products.id', 'purchase_carts.product_id')
            ->where('purchase_carts.user_id', auth()->id())
            ->select('purchase_carts.*', 'products.title', 'products.sku')
            ->orderBy('purchase_carts.id', 'DESC')->get();

        return $cart_items;
    }

    public function store($product_id, $quantity = 1)
    {
        // check the product is have or not
        $product = Product::find($product_id);
        if (!empty($product)) {
            // check the product is already in cart or not
            $cart = PurchaseCart::where('user_id', auth()->id())
                ->where('product_id', $product_id)->first();
            if (!empty($cart)) {
                // update cart item quantity
                $cart->quantity++;
                $cart->sub_total = $cart->purchase_amount * $cart->quantity;
                $cart->total_amount = $cart->sub_total - $cart->discount_amount;
                $cart->save();
            } else {
                // create cart item
                $purchase_amount = isset($product->purchase_amount) ? $product->purchase_amount : 0;
                $product_mrp = isset($product->price) ? $product->price : 0;
                $product_discount = isset($product->discount_amount) ? $product->discount_amount : 0;
                $product_quantity = 1;

                PurchaseCart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'purchase_amount' => $purchase_amount,
                    'sub_total' => $purchase_amount * $quantity,
                    'total_amount' => ($purchase_amount * $quantity) - $product_discount,
                    'discount_amount' => $product_discount,
                    'lot_no' => $product->sku,
                    'mrp' => $product_mrp,
                ]);

                // return response
                return true;
            }
        } else {
            // return response
            return false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cart_item = PurchaseCart::find($request->id);
        if ($cart_item) {

            // if the request is from existing purchase
            if ($request->purchase_order) {
                // check the product is available for update or not
                $purchase_product = PurchaseOrderProduct::where('purchase_order_id', $request->purchase_order)
                    ->where('product_id', $cart_item->product_id)->first();
                if (!empty($purchase_product)) {
                    $product = Product::find($purchase_product->product_id);
                    $new_quantity = $purchase_product->quantity - $request->input('quantity');
                    if ($product->quantity < $new_quantity) {
                        return false;
                    }
                }
            }

            $cart_item->quantity = $request->quantity;
            $cart_item->lot_no = $request->lot_no;
            $cart_item->purchase_amount = $request->purchase_amount;
            $cart_item->mrp = $request->mrp;
            $cart_item->sub_total = $request->quantity * $request->purchase_amount;
            $cart_item->discount_amount = $request->discount_amount;
            $cart_item->total_amount = $cart_item->sub_total - $request->discount_amount;
            $cart_item->save();
        }

        // return response
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart_item = PurchaseCart::find($id);
        $cart_item->delete();

        // return response
        return true;
    }
}
