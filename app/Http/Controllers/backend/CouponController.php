<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.coupon.index',compact('coupons'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => ['required','unique:coupons'],
            'discount' => ['required'],
        ]);

        $insert = Coupon::insert([
        "coupon_name" => strtoupper($request->input('coupon_name')),
        "discount" => $request->input('discount'),
        "created_at" => Carbon::now()
        ]);
        if($insert){
           return Redirect()->back()->with("insert",'Coupon Added Successfully!!');
        }
    }

  

    
    public function update(Request $request, $id)
    {
            $update =Coupon::findorFail($id)->update([
            "coupon_name" => $request->coupon_name,
            "discount" => $request->discount,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                return Redirect()->back()->with("update",'Coupon Updated Successfully!!'); 
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Coupon::findorFail($id)->delete();
        if($delete){
            return Redirect()->back()->with("delete",'Coupon Deleted Successfully!!');
        }
    }


    public function statusActive($id)
    {
        $up = Coupon::findorFail($id)->update([
            "status" => 1
        ]);
        if($up){
            return redirect()->back()->with('update','Status Activated Successfully!');
        }

    }

    public function statusInActive($id)
    {
        $up = Coupon::findorFail($id)->update([
            "status" => 0
        ]);
        if($up){
            return redirect()->back()->with('update','Status Inctivated Successfully!');
        }

    }
}
