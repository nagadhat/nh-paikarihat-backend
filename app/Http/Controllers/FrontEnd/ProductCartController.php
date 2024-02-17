<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCartController extends Controller
{
    public function addToCart()
    {
        $sessionId = session()->getId();
        // $sessionId = $_SERVER['REMOTE_ADDR'];
        $user_id = auth()->user()->id ?? null;
        if($user_id){
            $carts = ProductCart::where('user_id',$user_id)->with('product')->get();
        }else{
            $carts = ProductCart::where('session_id',$sessionId)->with('product')->get();
        }
        $totalprice = ProductCart::where('user_id', Auth::id())
            ->get()
            ->sum(function ($item) {
                return $item->unit_price * $item->quantity;
            });
        return view('front-end.cart.add-to-cart', compact('carts', 'totalprice'));
    }

    public function productAddCart(Request $request)
    {

        $sessionId = session()->getId();
        // $sessionId = $_SERVER['REMOTE_ADDR'];
        $data = $request->all();
        $user = Auth::user() ?? null;
        $product = Product::findOrFail(intval($data['productid']));
        $existingCartItem = ProductCart::where('session_id', $sessionId)
            ->where('product_id', $product->id)
            ->first();
        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            $cart = new ProductCart();
            $cart->user_id = $user->id ?? null;
            $cart->session_id = $sessionId;
            $cart->product_id = $product->id;
            $cart->quantity = 1;
            if ($product->discount_amount != null) {
                $cart->unit_price = ($product->price * 1);
            } else {
                $cart->unit_price = $product->price * 1;
            }
            $cart->order_type = 'REG';
            $cart->save();
        }
        // $product_count = ProductCart::where('session_id',$sessionId)->orWhere('user_id', $user->id ?? null)->count();

        $product_count = ProductCart::where('session_id', $sessionId)->orWhere('user_id', $user->id ?? null)
            ->get()
            ->sum(function ($item) {
                return $item->quantity;
            });

        return response()->json(['message' => 'working','product_count'=> $product_count]);
    }

    public function productDeleteCart($id)
    {
        ProductCart::findOrfail($id)->delete();
        Alert::success('Product Cart Deleted Successfuly!!!');
        return redirect()->back();
    }
    public function productIncrement(Request $request)
    {
       $sessionId = session()->getId();
    //    $sessionId = $_SERVER['REMOTE_ADDR'];
        $data = $request->all();

        $existingCartItem = ProductCart::where('session_id', $sessionId )->where('id', $data['productid'])->first();
        $unitPrice = $existingCartItem->unit_price;
        $exqty = $existingCartItem->quantity;
        if ($existingCartItem) {
            if ('increment' == $data['type']) {
                $existingCartItem->quantity += 1;
                $exqty +=1;
                $existingCartItem->save();
                $totalprice = ProductCart::where('session_id', $sessionId )
                    ->get()
                    ->sum(function ($item) {
                        return $item->unit_price * $item->quantity;
                    });
            } else if('manual' == $data['type']){
                $data = $request->all();
                $existingCartItem->quantity = $data['qty'];
                $existingCartItem->save();
                $unitPrice = $data['unit_price'];
                $exqty =  $data['qty'];
                $totalprice = $data['unit_price'] *  $data['qty'];
            }else {
                if ($existingCartItem->quantity <= 1) {
                    return response()->json(['message' => 'invalid', 'quantity' => $existingCartItem->quantity]);
                }
                $existingCartItem->quantity -= 1;
                $exqty -=1;
                $existingCartItem->save();
                $totalprice = ProductCart::where('session_id', $sessionId )
                    ->get()
                    ->sum(function ($item) {
                        return $item->unit_price * $item->quantity;
                    });
            }
            // $user_id = Auth::user()->id ?? null;
            $totaldiscount = ProductCart::where('session_id', $sessionId )
            ->with('product')
            ->get()
            ->sum(function ($item) {
                if ($item->product) {
                    $discountPerItem = $item->product->discount_amount;
                    $quantity = $item->quantity;
                    return $discountPerItem * $quantity;
                } else {
                    return 0;
                }
            });

            return response()->json(['message' => 'working', 'quantity' => $exqty, 'totalprice' => $totalprice, 'unitPrice' => $unitPrice ,'totaldiscount'=>$totaldiscount]);
        } else {

            return response()->json(['message' => 'Not working']);
        }
    }



    // public function ProductaddToCart()
    // {

    //     return view('front-end.cart.product-add-to-cart');
    // }

    // public function removeCartItem($rowId)
    // {
    //     $getCart = Cart::get($rowId);
    //     $name = $getCart->name = 'akash';
    //     // Cart::remove($rowId);
    //     Cart::update($rowId, $name);
    //     return redirect()->back();

    // }

}
