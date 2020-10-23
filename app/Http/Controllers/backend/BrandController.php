<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.brand.index',compact('brands'));
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
            'brand_name' => ['required','unique:brands'],
        ]);

        $insert = Brand::insert([
"brand_name" => $request->input('brand_name'),

"created_at" => Carbon::now()
        ]);
        if($insert){
           return Redirect()->back()->with("insert",'Brand Added Successfully!!');
        }
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Brand::where('brand_name', $request->brand_name)->first()){
            return Redirect()->back()->with("error",'Brand Already Added!!');
        }else{
            $update =Brand::findorFail($id)->update([
            "brand_name" => $request->brand_name,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                return Redirect()->back()->with("update",'Brand Updated Successfully!!'); 
            }
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
        $delete = Brand::findorFail($id)->delete();
        if($delete){
            return Redirect()->back()->with("delete",'Brand Deleted Successfully!!');
        }
    }
}
