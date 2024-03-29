<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PosCart;
use Illuminate\Http\Request;

class PosController extends Controller
{
    // function to show pos page
    public function index()
    {
        // remove pos cart items
        $items = PosCart::where('user_id', auth()->id())->get();
        foreach ($items as $item) {
            $item->delete();
        }

        // return to pos
        return view('customer.pos.index');
    }

    // function to get customer details
    public function getCustomer(Request $request)
    {
        $customer = Customer::where('username', $request->input('username'))
            ->where('is_admin', 0)->first();

        // return response
        return response()->json([
            'customer' => $customer
        ]);
    }

    // function to get products
    public function getProducts(Request $req)
    {
        $search = $req->input('query');
        $products = Product::where('user_id', auth()->id())
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('sku', 'LIKE', '%' . $search . '%')
            ->orWhereHas('brands', function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->get();

        // return response
        return response()->json([
            'products' => $products
        ]);
    }

    // function to show pos sales
    public function sales()
    {
        $sales = Order::where('user_id', auth()->id())
            ->where('order_from', 'pos')->get();
        return view('customer.pos.sales', compact('sales'));
    }

    // function to sale from pos
    public function sale(Request $req)
    {
        // cart items
        $user_id = auth()->id();
        $customer_id = $req->input('customer_id') == null ? 0 : $req->input('customer_id');
        $cart_items = PosCart::where('user_id', $user_id)
            ->where('customer_id', $customer_id)->get();

        if ($cart_items->count() > 0) {
            // total order amount
            $total_amount = PosCart::totalOrderPrice($customer_id);

            // create order
            $customer = User::find($customer_id);

            $order = new Order();
            $order->user_id = $user_id;
            $order->order_code = rand(111, 999);
            $order->order_prefix = 'POS';
            $order->customer_name = ($customer_id == 0) ? 'Walk-in Customer' : $customer->name;
            $order->customer_phone = ($customer_id == 0) ? 'Walk-in Customer' : $customer->phone;
            $order->customer_email = ($customer_id == 0) ? 'Walk-in Customer' : $customer->email;
            $order->customer_address = 'Physical Store';
            $order->discount_amount = $req->input('discount_amount');
            $order->total_amount = $total_amount;
            $order->order_from = 'pos';
            $order->save();

            foreach ($cart_items as $item) {
                // store order product
                $order_product = new OrderProduct();
                $order_product->order_id = $order->id;
                $order_product->product_id = $item->product_id;
                $order_product->quantity = $item->quantity;
                $order_product->unit_price = $item->productDetails->price;
                $order_product->save();

                // remove cart item
                $item->delete();
            }

            // return back
            toast('Order placed successfully', 'success');
            return redirect()->back();
        } else {
            // return back
            toast('Invalid order. Try again.', 'error');
            return redirect()->back();
        }
    }
}
