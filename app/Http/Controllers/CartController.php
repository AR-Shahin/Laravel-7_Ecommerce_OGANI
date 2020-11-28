<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\SiteIdentity;
use App\Models\SocialLink;

class CartController extends Controller
{
    public function addToCart(Request $request ,$pid)
    {
        if($request->expid){
            echo 'extra';
        }else{
            echo 'single';
        }
        $chk = Cart::where('product_id',$pid)->where('user_ip',request()->ip())->first();
        if($chk){
            Cart::where('product_id',$pid)->increment('qty');
            return redirect()->back()->with('Cart_insert','Product Added to Cart !!');
        }else{
            $cart = new Cart();
            $cart->product_id = $pid;
            $cart->qty = 1;
            $cart->price = $request->price;
            $cart->image = $request->image;
            $cart->product_name = $request->product_name;
            $cart->user_ip = request()->ip();
            if($cart->save()){
            return redirect()->back()->with('Cart_insert','Product Added to Cart !!');
            }
        } 
    }

    public function ViewCart(){
        $data=[];
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        $data['subTotal'] = Cart::all()->where('user_ip',request()->ip())->sum(function($sum){
            return $sum->price* $sum->qty;
        });
        $data['carts'] = Cart::where('user_ip',request()->ip())->latest()->get();
        return view('frontend.cart',compact('data'));
    }
    public function CartUpdate(Request $request ,$id)
    {
        if($request->qty ==0){
            $delete = Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
            return Redirect()->back()->with("Cart_insert",'Product Deleted! Due to Quantity was Zero!!');
        }else{
        $update = Cart::where('id',$id)->where('user_ip',request()->ip())->update(
            ['qty' => $request->qty,]
        );
        if($update){
            return Redirect()->back()->with("Cart_insert",'Quantity Updated Successfully!!');
        }
    }
}
    public function delete($id)
    {
        $delete = Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
        if($delete){
            return Redirect()->back()->with("Cart_insert",'Product Deleted Successfully!!');
        }
    }

    public function ApplyCoupon(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon_name)->first();
        if($check){
            Session::put('coupon',[
                'coupon_name' => $check->coupon_name,
                'discount' => $check->discount,
            ]);
            return Redirect()->back()->with("Cart_insert",'Coupon Added Successfully!!');
        }else{
            return Redirect()->back()->with("warning",'Invaild Coupon!');
        }
    }

     public function DestroyCoupon()
    {
        session()->forget('coupon');
        return Redirect()->back()->with("Cart_insert",'Coupon Has Deleted!!');
    }
}
            