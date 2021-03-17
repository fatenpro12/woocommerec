<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ReportOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index()
   {
       $orders=Order::orderby('created_at')->get();
       return view('admin.orders.index')->with('orders',$orders);
   }
   public function reported_orders()
   {
       $orders=ReportOrder::orderby('created_at')->get();
       return view('admin.orders.reported_orders')->with('orders',$orders);
   }
}
