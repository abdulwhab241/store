<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConfirmRequest;

class CartController extends Controller
{
    public function index() 
    {
        return view('cart.index');
    }

    public function add(Request $request, $id)
    {
        // Check user is login or not
        if(isset(Auth::user()->name))
        {
            $product = Product::find($id);
            $message =  add_product_to_cart($product->id, $request->quantity);
            return redirect()->back()->with('message',$message);
        }
        else
        {
            return redirect('/login')->with('message', ' يرحى تسجيل الدخول من اجل اتمام العملية ');
        }
    }

    public function remove($id ,$user_id)
    {
            $product =Cart::where('id',$id)->where("user_id",$user_id)->first();
            if($product)
            {
                $product->delete();
                return redirect()->back()->with('error', ' تم حذف المنتج من السلة ');
            }
            else{
                return redirect()->back()->with('error', 'المنتج غير موجود');
            }
    }

    // public function done(ConfirmRequest $request)
    // {
    //     dd("ddd");
    //     $order = new Order();
    //     $order->user_id = auth()->id();
    //     $order->first_name = strip_tags($request->input("first_name"));
    //     $order->last_name = strip_tags($request->input("last_name"));
    //     $order->company_name = strip_tags($request->input("company_name"));
    //     $order->address = strip_tags($request->input("address"));
    //     $order->address_number = strip_tags($request->input("address_number"));
    //     $order->city = strip_tags($request->input("city"));
    //     $order->area = strip_tags($request->input("area"));
    //     $order->phone = strip_tags($request->input("phone"));
    //     $order->payment_method = strip_tags($request->input("payment_method"));
    //     $order->order_notice = strip_tags($request->input("order_notice"));
    //     $order->save();
    //     return redirect()->back()->with('message' , 'The request has been sent successfully');
    // }
}
