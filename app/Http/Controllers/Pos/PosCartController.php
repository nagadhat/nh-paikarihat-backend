<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PosCart;
use App\Models\Product;

class PosCartController extends Controller
{
    // function to increase cart item
    public function increase(Request $req)
    {
        $item = PosCart::where('product_id', $req->product_id)
            ->where('customer_id', $req->customer_id)
            ->where('user_id', auth()->id())
            ->first();
        $product = Product::find($req->product_id);

        if (!empty($item)) {
            // update cart
            if ($product->quantity >= $req->quantity) {
                $item->quantity = $req->quantity;
                $item->save();
            } else {
                // return response
                return false;
            }
        } else {
            // create cart
            $cart = new PosCart();
            $cart->user_id = auth()->id();
            $cart->customer_id = (int)$req->customer_id;
            $cart->product_id = (int)$req->product_id;
            $cart->quantity = 1;
            $cart->save();
        }

        // return response
        return true;
    }

    // function to get pos cart items
    public function index(Request $req)
    {
        // cart items
        $items = PosCart::with('productDetails')
            ->where('customer_id', $req->customer_id)
            ->where('user_id', auth()->id())
            ->get();

        // total amount
        $total_amount = PosCart::totalOrderPrice($req->customer_id);

        // return response
        return response()->json([
            'cart_items' => $items,
            'total_amount' => $total_amount
        ]);
    }

    // function to decrease pos cart item qty
    public function decrease(Request $req)
    {
        $item = PosCart::where('product_id', $req->product_id)
            ->where('customer_id', $req->customer_id)
            ->where('user_id', auth()->id())
            ->first();

        $item_new_qty = $item->quantity - 1;
        if ($item_new_qty > 0) {
            // update cart item
            $item->quantity -= 1;
            $item->save();
        } else {
            // remove cart item
            $item->delete();
        }

        // return response
        return response(
            true
        );
    }

    // function to remove pos cart item
    public function remove(Request $req)
    {
        $item = PosCart::where('product_id', $req->product_id)
            ->where('customer_id', $req->customer_id)
            ->where('user_id', auth()->id())
            ->first();

        $item->delete();

        // return response
        return response(
            true
        );
    }
}
