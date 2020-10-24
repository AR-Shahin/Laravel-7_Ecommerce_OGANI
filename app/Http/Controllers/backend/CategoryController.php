<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
class CategoryController extends Controller
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
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.category.index',compact('categories'));
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
            'cat_name' => ['required','unique:categories'],
            'cat_img' => ['required','mimes:jpg,png,jpeg','max:5000'],
        ]);
        $image = $request->file('cat_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $uploads = 'images/category/';
        $last_img = $uploads . $name_gen;
        Image::make($image)->resize(270,270)->save($last_img);
        $insert = Category::insert([
        "cat_name" => $request->input('cat_name'),
         "cat_img" => $last_img,
        "created_at" => Carbon::now()
        ]);
        if($insert){
           return Redirect()->back()->with("insert",'Category Added Successfully!!');
        }
    }
  
    public function update(Request $request, $id)
    {

            $image = $request->file('cat_img');
            if($image){
                $old_img = $request->old_img;
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $uploads = 'images/category/';
                $last_img = $uploads . $name_gen;
                Image::make($image)->resize(270,270)->save($last_img);
                
                $update =Category::findorFail($id)->update([
                    "cat_name" => $request->cat_name,
                    "cat_img" => $last_img,
                    'updated_at' => Carbon::now()
                    ]);
                    if($update){
                        unlink($old_img);
                        return Redirect()->back()->with("update",'Category Updated Successfully!!'); 
                    }
            }else{
            $update =Category::findorFail($id)->update([
            "cat_name" => $request->cat_name,
                'updated_at' => Carbon::now()
            ]);  
            if($update){
                return Redirect()->back()->with("update",'Category Updated Successfully!!'); 
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
        $oldData =  Category::findorFail($id);
        $oldImg = $oldData->cat_img;
        $delete = Category::findorFail($id)->delete();
        if($delete){
            unlink($oldImg);
            return Redirect()->back()->with("delete",'Category Deleted Successfully!!');
        }
    }
}
