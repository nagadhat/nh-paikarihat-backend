<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCartController extends Controller
{
    public function addToCart()
    {
        $user_id = auth()->user()->id;
        $carts = ProductCart::where('user_id', $user_id)->with('product')->get();
        return view('front-end.cart.add-to-cart', compact('carts'));
    }

    public function productAddCart(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $product = Product::findOrFail(intval($data['productid']));
        $existingCartItem = ProductCart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();
        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            $cart = new ProductCart();
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->quantity = 1;

            if ($product->discount_amount != null) {
                $cart->unit_price = $product->discount_amount * 1;
            } else {
                $cart->unit_price = $product->price * 1;
            }
            $cart->order_type = 'REG';
            $cart->save();
        }
        $product_count = ProductCart::where('user_id', $user->id)->count();

        return response()->json(['message' => 'working', 'product_count' => $product_count]);
    }

    public function productDeleteCart($id)
    {
        ProductCart::findOrfail($id)->delete();
        Alert::success('Product Cart Deleted Successfuly!!!');
        return redirect()->back();
    }
    public function productIncrement(Request $request) {
        $data = $request->all();
        // $user = Auth::user();
        // $product = Product::findOrFail(intval($data['productid']));
        $existingCartItem = ProductCart::where('user_id', intval($data['userid']))
            ->where('product_id', intval($data['productid']))
            ->first();
        if ($existingCartItem) {
            if ('increment'==$data['type']) {
                $existingCartItem->quantity += 1;
                $existingCartItem->save();
                return response()->json(['message' => 'working','quantity' =>$existingCartItem->quantity]);
            }elseif('decrement'==$data['type']) {

                if ($existingCartItem->quantity<=1) {
                    return response()->json(['message' => 'invalid','quantity' =>$existingCartItem->quantity]);
                }
                $existingCartItem->quantity -= 1;
                $existingCartItem->save();
                return response()->json(['message' => 'working','quantity' =>$existingCartItem->quantity]);
            }else {

                return response()->json(['message' => 'invalid','quantity' =>$existingCartItem->quantity]);
            }

        } else {
            return response()->json(['message' => 'Not working']);
            // $cart = new ProductCart();
            // $cart->user_id = $user->id;
            // $cart->product_id = $product->id;
            // $cart->quantity = 1;

            // if ($product->discount_amount != null) {
            //     $cart->unit_price = $product->discount_amount * 1;
            // } else {
            //     $cart->unit_price = $product->price * 1;
            // }
            // $cart->order_type = 'REG';
            // $cart->save();
        }
        // $product_count = ProductCart::where('user_id', $user->id)->count();


    }
}