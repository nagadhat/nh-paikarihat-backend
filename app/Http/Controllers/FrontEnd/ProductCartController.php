<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCartController extends Controller
{
    public function addToCart() {
        return view('front-end.cart.add-to-cart');
    }

    public function productAddCart(Request $request, $id) {
        if (Auth::id()) {
           $user = Auth::user();
           $products = Product::findOrFail($id);
           $cart = new ProductCart();
           $cart->user_id     = $user->id;
           $cart->product_id  = $products->id;
           $cart->quantity    = $products->quantity;
           if ($products->discount_amount!=null) {
            $cart->unit_price        = $products->discount_amount * $request->quantity;
           }else {
            $cart->unit_price        = $products->price * $request->quantity;
           }
           $cart->order_type    = 'Regular';
           $cart->save();
           return redirect()->back();
        }
    }

}
