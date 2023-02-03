<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConfirmRequest;

class CheckoutController extends Controller
{
    public function index() 
    {
        if(isset(Auth::user()->name))
            {
                return view('checkouts.index');
            }
            else
            {
                return redirect('/login')->with('message', ' يرحى تسجيل الدخول من اجل اتمام العملية ');
            }
    }

    public function done(ConfirmRequest $request)
    {
        $order = new Order();
        $order->user_id = auth()->id();
        $order->first_name = strip_tags($request->input("first_name"));
        $order->last_name = strip_tags($request->input("last_name"));
        $order->company_name = strip_tags($request->input("company_name"));
        $order->address = strip_tags($request->input("address"));
        $order->address_number = strip_tags($request->input("address_number"));
        $order->city = strip_tags($request->input("city"));
        $order->area = strip_tags($request->input("area"));
        $order->phone = strip_tags($request->input("phone"));
        $order->payment_method = strip_tags($request->input("payment_method"));
        $order->order_notice = strip_tags($request->input("order_notice"));
        $order->save();

        foreach(get_cart() as $cart){
            OrderedItem::create([
                "order_id"=>$order->id,
                "product_id"=>data_get($cart,"product_id"),
                "price"=>data_get($cart,"product.price"),
                "quantity"=>data_get($cart,"quantity"),
            ]);
        }

        clear_cart();
        
        return redirect()->back()->with('message' , 'شكراً لك تم إستلام طلبك. ');
    }
}
