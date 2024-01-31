<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderReturnRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class OderController extends Controller
{
    // function to show all orders
    public function index()
    {
        $ordersdetails = Order::all();
        return view('customer.order.orders', compact('ordersdetails'));
    }

    // order Status change
    public function orderStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $currentStatus = $order->status;
        if ($currentStatus == $status) {
            toast('Already updated.', 'error');
        } else {
            $order->status = $status;
            $order->save();
            toast('Order status updated successfully.', 'success');
        }
        return redirect()->back();
    }

    // function to order filterring
    public function orderFilter($status)
    {
        $ordersdetails = Order::where('status', '=', $status)->get();
        return view('customer.order.orders', compact('ordersdetails'));
    }

    //function to view order details
    public function viewOrderDetails($id)
    {
        $orderProductList = OrderProduct::where('order_id', $id)->get();
        $order = Order::where('id', $id)->first();
        return view('customer.order.view-order-details', compact('order','orderProductList'));
    }

    //function to order invoice
    public function orderInvoice($id)
    {
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        return view('customer.order.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }

    //Function to payment Status Update
    public function paymentStatusUpdate($id, $paystatus)
    {
        $order = Order::findOrFail($id);
        $currentStatus = $order->payment_status;

        if ($currentStatus == $paystatus) {
            toast('Already updated.', 'error');
        } else {
            $order->payment_status = $paystatus;
            $order->save();
            toast('Payment status updated successfully.', 'success');
        }
        return redirect()->back();
    }

    // function to all return order 
    public function returnOrders()
    {
        $orderReturn = OrderReturnRequest::all();
        return view('customer.order.return-orders', compact('orderReturn'));
    }
    
    // function to return order filter
    public function returnOrderFilter($status)
    {
        $orderReturn = OrderReturnRequest::where('status', '=', $status)->get();
        return view('customer.order.return-orders', compact('orderReturn'));
    }

    // function to return order status change
    public function returnOrderStatus($id, $status)
    {
        $order = OrderReturnRequest::findOrFail($id);
        $currentStatus = $order->status;
        if ($currentStatus == $status) {
            toast('Already updated.', 'error');
        } else {
            $order->status = $status;
            $order->save();
            toast('Order status updated successfully.', 'success');
        }
        return redirect()->back();
    }

    public function orderDetails($invoice)
    {
        $order_id = substr($invoice, 3,  -3);
        $orderDetails = Order::where('user_id', auth()->id())->first();

        if (empty($orderDetails)) {
            toast('Order details not found.', 'error');
            return redirect()->back();
        } else {
            return view('customer.order.order-details', compact('order_id', 'orderDetails'));
        }
    }
}
