<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Models\Cart;
use App\Order;

class OrderController extends Controller
{
     public function index(Request $request)
    {
         $data= [];
         $data['orderData'] = Order::where('user_ip', $request->ip())->where('status' ,'!=',4)->latest()->get();
        return view('frontend.order.index',compact('data'));
    }
     public function checkout()
    {
        return view('frontend.order.checkout');
    }
    public function ConfirmOrder(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
        ]);
        if(session()->has('coupon')){
            $cpnnm = session()->get('coupon')['coupon_name'];
        }else{
            $cpnnm = 'NULL';
        }
        $cus = new Customer();
      $cus->name = $request->name;
      $cus->email = $request->email;
      $cus->user_ip = $request->ip();
      $cus->coupon_name = $cpnnm;
      $cus->phone = $request->phone;
     if($cus->save()){
     $cartData = Cart::where('user_ip',$request->ip())->get();
        foreach($cartData as $cart){
            $or = new Order();
            $or->user_ip = $request->ip();
            $or->product_id = $cart->product_id;
            $or->qty = $cart->qty;
            $or->price = $cart->price;
            $or->coupon_name = $cpnnm ;
            $or->save();
        }
        foreach($cartData as $cart){
            $cartData = Cart::where('user_ip',$request->ip())->delete();
        }
        if(session()->has('coupon')){
            session()->forget('coupon');
        }
      return redirect('order.index');
     }
        //return view('frontend.order.checkout');
    }


    public function ManageOrder(){
        $data = [];
        $data['orders'] = Order::latest()->get();
        return view('backend.order.index',compact('data'));
    }

    public function ShiftedOrder($id){
        $update = Order::find($id)->update([
            "status" =>1,
        ]);
        if($update){
            return redirect()->back()->with('success','Shifted Order!');
        }
    }
    public function trashdOrder($id){
        $update = Order::find($id)->update([
            "status" =>4,
        ]);
        if($update){
            return redirect()->back()->with('success','Trashed Order!');
        }
    }

}

