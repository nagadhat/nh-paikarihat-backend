<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseCart;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderPayment;
use App\Models\PurchaseOrderProduct;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // function to show purchase list
    public function index()
    {
        $purchases = Purchase::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view('customer.purchase.index', compact('purchases'));
    }

    // function to show create purchase
    public function create()
    {
        $suppliers = Supplier::where('user_id', auth()->id())->get();
        $products = Product::where('user_id', auth()->id())->get();

        // destroy existing cart items
        $cart_items = PurchaseCart::where('user_id', auth()->id())->get();
        foreach ($cart_items as $item) {
            $item->delete();
        }

        return view('customer.purchase.create', compact(
            'suppliers',
            'products'
        ));
    }

    // function to store purchase
    public function store(Request $request)
    {
        // check the cart is null or not
        $cart_items = PurchaseCart::where('user_id', auth()->id())->get();
        if ($cart_items->count() <= 0) {
            return redirect()->back()->with(
                'message',
                'Add atleast one product.'
            );
        }

        // check the supplier is have or not
        if (empty($request->supplier)) {
            return redirect()->back()->with(
                'message',
                'Select a supplier.'
            );
        }

        // create purchase order
        $purchase_order = new PurchaseOrder();
        $purchase_order->user_id = auth()->id();
        $purchase_order->supplier_id = $request->input('supplier');
        $purchase_order->date = $request->input('purchase-date');
        $purchase_order->total_amount = $request->input('total-amount');
        $purchase_order->paid_amount = $request->input('paid-amount');
        $purchase_order->due_amount =  $request->input('total-amount') - $request->input('paid-amount');
        $purchase_order->shipping_charge = $request->input('shipping-charge');
        $purchase_order->payment_status = $request->input('payment-status');
        $purchase_order->purchase_status = $request->input('purchase-status');
        $purchase_order->save();

        // create purchase payment
        $purchase_payment = new PurchaseOrderPayment();
        $purchase_payment->purchase_order_id = $purchase_order->id;
        $purchase_payment->payment_method = $request->input('payment-method');
        $purchase_payment->amount = $purchase_order->paid_amount;
        $purchase_payment->payment_comment = $request->input('comment');

        if ($purchase_order->paid_amount > 0) {
            $purchase_payment->save();
        }

        foreach ($cart_items as $item) {

            $product = product::find($item->product_id);
            if (!empty($product)) {
                // update product purchase amount
                $product->update([
                    'purchase_amount' => $item->purchase_amount,
                    'price' => $item->mrp,
                    'quantity' => $product->quantity + $item->quantity
                ]);
            }

            // create purchase product
            PurchaseOrderProduct::create([
                'purchase_order_id' => $purchase_order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'purchase_amount' => $item->purchase_amount,
                'discount_amount' => $item->discount_amount,
                'total_amount' => $item->total_amount,
                'lot_no' => $item->lot_no,
                'mrp' => $item->mrp,
            ]);

            // destroy purchase cart item
            $item->delete();
        }

        // return back
        toast('Purchase created successfully.', 'success');
        return redirect()->route('purchase_list');
    }

    // function to show edit purchase
    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::where('user_id', auth()->id())->get();
        $products = Product::where('user_id', auth()->id())->get();

        // update purchase cart items
        $cart_items = PurchaseCart::where('user_id', auth()->id())->get();
        foreach ($cart_items as $item) {
            $item->delete();
        }

        $purchase_products = PurchaseOrderProduct::where('purchase_order_id', $purchase->id)->get();
        foreach ($purchase_products as $item) {
            $purchase_cart = new PurchaseCartController();
            $purchase_cart->store($item->product_id, $item->quantity);
        }

        return view('customer.purchase.edit', compact(
            'purchase',
            'suppliers',
            'products'
        ));
    }

    // function to update purchase
    public function update(Request $request, Purchase $purchase)
    {
        // check the cart is null or not
        $cart_items = PurchaseCart::where('user_id', auth()->id())->get();
        if ($cart_items->count() <= 0) {
            return redirect()->back()->with(
                'message',
                'Add atleast one product.'
            );
        }

        // check the supplier is have or not
        if (empty($request->supplier)) {
            return redirect()->back()->with(
                'message',
                'Select a supplier.'
            );
        }

        // update purchase order
        $purchase->supplier_id = $request->input('supplier');
        $purchase->date = $request->input('purchase-date');
        $purchase->paid_amount = $request->input('paid-amount');
        $purchase->due_amount =  $request->input('total-amount') - $request->input('paid-amount');
        $purchase->shipping_charge = $request->input('shipping-charge');
        $purchase->total_amount = $request->input('total-amount');
        $purchase->payment_status = $request->input('payment-status');
        $purchase->purchase_status = $request->input('purchase-status');
        $purchase->save();

        // update purchase payment
        $purchase_payment = PurchaseOrderPayment::where('purchase_order_id', $purchase->id);
        if ($purchase_payment->sum('amount') < $purchase->total_amount) {
            $purchase_payment->payment_method = $request->input('payment-method');
            $purchase_payment->amount = $purchase->paid_amount;
            $purchase_payment->payment_comment = $request->input('comment');

            if ($purchase->paid_amount > 0) {
                $purchase_payment->save();
            }
        }

        foreach ($cart_items as $item) {

            $purchase_product = PurchaseOrderProduct::where('purchase_order_id', $purchase->id)
                ->where('product_id', $item->product_id)->first();
            $product = product::find($item->product_id);

            // create purchase product
            $purchase_product->update([
                'quantity' => $item->quantity,
                'purchase_amount' => $item->purchase_amount,
                'discount_amount' => $item->discount_amount,
                'total_amount' => $item->total_amount,
                'lot_no' => $item->lot_no,
                'mrp' => $item->mrp,
            ]);

            // update product
            if (!empty($product)) {
                $new_quantity = ($item->quantity > $purchase_product->quantity) ? $product->quantity + ($item->quantity - $purchase_product->quantity) : $product->quantity - ($purchase_product->quantity - $item->quantity);
                $product->update([
                    'purchase_amount' => $item->purchase_amount,
                    'price' => $item->mrp,
                    'quantity' => $new_quantity
                ]);
            }

            // destroy purchase cart item
            $item->delete();
        }

        // return back
        toast('Purchase updated successfully.', 'success');
        return redirect()->route('purchase_list');
    }

    // function to show inspect purchase
    public function inspect(Purchase $purchase)
    {
        $supplier = Supplier::find($purchase->supplier_id);

        // update purchase cart items
        $cart_items = PurchaseCart::where('user_id', auth()->id())->get();
        foreach ($cart_items as $item) {
            $item->delete();
        }

        $purchase_products = PurchaseOrderProduct::where('purchase_order_id', $purchase->id)->get();
        foreach ($purchase_products as $item) {
            $purchase_cart = new PurchaseCartController();
            $purchase_cart->store($item->product_id, $item->quantity);
        }
        return view('customer.purchase.inspect', compact(
            'purchase',
            'supplier',
        ));
    }
}
