<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    // function to get customer order details 
    public function customerOrderHistory()
    {  
        Paginator::useBootstrap();
        $user= auth()->user();
        $orderdetails = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('front-end.order.customer-order-history', compact('orderdetails'));
    }
    
    // function to view cutomer order details
    public function customerOrderDetails($id)
    {
        $customerOrderProduct = OrderProduct::where('order_id', $id)->get();
        $order = Order::where('id', $id)->first();
        return view('front-end.order.customer-order-details', compact('order', 'customerOrderProduct'));
    }

    // function to order invoice
    public function invoiceOrder($id) {
        $orderDetails = Order::where('id', $id)->first();
        $orderProductsDetailslist = OrderProduct::where('order_id', $id)->get();
        return view('front-end.invoice.order-invoice', compact('orderDetails', 'orderProductsDetailslist'));
    }
}
