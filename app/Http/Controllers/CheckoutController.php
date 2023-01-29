<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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

    public function confirm(ConfirmRequest $request)
    {
        // $order = Order::create([
        //     "user_id" => auth()->id(),
        //     "first_name" => $request->input("first_name"),
        //     "last_name" => $request->input("last_name"),
        //     "company_name" => $request->input("company_name"),
        //     "address" => $request->input("address"),
        //     "address_number" => $request->input("address_number"),
        //     "city" => $request->input("city"),
        //     "area" => $request->input("area"),
        //     "phone" => $request->input("phone"),
        //     "payment_method" => $request->input("payment_method"),
        //     "order_notice" => $request->input("order_notice")
        // ]);
        // $order->save();
        $order = new Order();
        $order->user_id = auth()->id();
        $order->first_name= $request->input("first_name");
        $order->last_name= $request->input("last_name");
        $order->company_name= $request->input("company_name");
        $order->address= $request->input("address");
        $order->address_number= $request->input("address_number");
        $order->city= $request->input("city");
        $order->area= $request->input("area");
        $order->phone= $request->input("phone");
        $order->payment_method= $request->input("payment_method");
        $order->order_notice= $request->input("order_notice");
        $order->save();

        // $cartItems = Cart::with(["product"])->where("user_id", auth()->id())->get();
        // foreach ($cartItems as $item) {
        //     Order::create([
        //         'cart_id' => $item->cart_id,
        //     ]);
        // }

        return redirect()->back()->with(['message' => 'The request has been sent successfully']);
    }
}
