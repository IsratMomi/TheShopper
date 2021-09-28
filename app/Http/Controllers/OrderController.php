<?php

namespace App\Http\Controllers;

use App\OnlinePay;
use App\Order;
use App\Orderitem;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return view('Admin.Orders.Orders',compact('orders'));
    }


    public function viewOrder($id){
        if(Order::where('id',$id)->exists()){
            $orders = Order::find($id);
            return view('Admin.Orders.ViewOrder',compact('orders'));
        }
        else{
            return redirect()->back()->with('satus','No order found');
        }

    }

    public function revieworder($id){
        $order = Order::find($id);
        if($order->status=='Pending'||$order->status=='pending'){
        $update_order = DB::table('customer_orders')
        ->where('id', $id)
        ->update(['status' => 'processing']);
        }


        /*$update_order = DB::table('customer_orders')
        ->where('id', $id)
        ->update(['status' => 'processing']);
        $orders = Order::all();*/
        $orders = Order::all();
        return view('Admin.Orders.Orders',compact('orders'));

    }


    public function reviewPayment($id){
        if(OnlinePay::where('id',$id)->exists()){
            $orders = OnlinePay::find($id);
            return view('Admin.Orders.ViewOrder',compact('orders'));
        }
        else{
            return redirect()->back()->with('status','No order found');
        }
    }

    public function productOrdered(){

       /* $orders = DB::table('customer_orders')
        ->join('order_items','customer_orders.id','=','order_items.order_id')
        ->select('customer_orders.status','order_items.*')->get();
        dd($orders);*/

        $orders = DB::table('order_items')
        ->join('customer_orders','order_items.order_id','=','customer_orders.id')
        ->join('products','order_items.product_id','=','products.id')
        ->select('order_items.*','customer_orders.status as status','products.Vendor_id as vendorId')
        ->get();
        //dd($orders);
        return view('Vendors.OrderedProducts.customer-orders',compact('orders'));

        /*$vendor_id = Auth::user()->id;
        $order_status=Order::where('status','processing')->first();

                if($order_status){
                    $orders = Orderitem::all();
                    return view('Vendors.OrderedProducts.customer-orders',compact('orders'));
                }
               else{
                return view('Vendors.nothing-to-review')->with('status','No unconfirmed orders');

            }*/

    }

    public function confirmOrder(){
        $update_order = DB::table('customer_orders')
            ->where('status', 'processing')
            ->update(['status' => 'On delivery']);

            $orders = DB::table('order_items')
            ->join('customer_orders','order_items.order_id','=','customer_orders.id')
            ->join('products','order_items.product_id','=','products.id')
            ->select('order_items.*','customer_orders.status as status','products.Vendor_id as vendorId')
            ->get();

            return view('Vendors.OrderedProducts.customer-orders',compact('orders'))->with('status','order reviewed');
    }

    public function myorders(){
        $user_mail = Auth::user()->email;
        $orders = Order::where('email',$user_mail)->get();
        return view('User.Orders.myOrders',compact('orders'));
    }

    public function removeOrder($id){
        $orders = Order::find($id);
        $orders->delete();
        return redirect('/my_orders')->with('orders',$orders);
    }
}
