<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SliderImage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['products'] = Product::orderBy('id','desc')->get();

        return view('backend.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['brands'] = Brand::orderBy('id','desc')->get();
        return view('backend.product.addProduct',compact('data'));
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
            'product_name' => ['required','unique:products'],
            'cat_id' => ['required'],
            'brand_id' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'short_des' => ['required'],
            'long_des' => ['required'],
            'main_image' => ['required','mimes:jpg,png,jpeg','max:5000'],
        ]);

        $image = $request->file('main_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $uploads = 'images/product/';
        $last_img = $uploads . $name_gen;
        Image::make($image)->resize(270,270)->save($last_img);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->short_des = $request->short_des;
        $product->long_des = $request->short_des;
        $product->main_image = $last_img;
        $product->created_at = Carbon::now();
        $product->slug =  Str::slug($request->product_name, '-');
        if($product->save()){
            $id =  $product->id;
            $mulImage = $request->file('slider_images');

            foreach ($mulImage as $single_img){
                $name_gen = hexdec(uniqid()) . '.' . $single_img->getClientOriginalExtension();
        $uploads = 'images/sliders/';
        $last_img = $uploads . $name_gen;
        Image::make($single_img)->resize(270,270)->save($last_img);
                $sImg = new SliderImage();
                $sImg->product_id = $id ;
                $sImg->images = $last_img ;
               $sImg->save();
            }
return redirect()->back()->with('insert','Product Added Successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $id = base64_decode($id);
         $data = array();
         $data['product'] = Product::where('id', $id)->get();
         $data['slider_images'] = SliderImage::where('product_id', $id)->get();
         return view('backend.product.singleProduct',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $data = array();
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['brands'] = Brand::orderBy('id','desc')->get();
        $data['product'] = Product::findorFail($id);
        $data['slider_images'] = SliderImage::where('product_id', $id)->get();
        return view('backend.product.editProduct',compact('data'));
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
        $request->validate([
            'product_name' => ['required'],
            'cat_id' => ['required'],
            'brand_id' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'short_des' => ['required'],
            'long_des' => ['required'],
            'main_image' => ['mimes:jpg,png,jpeg','max:5000'],
        ]);
        $main_image = $request->file('main_image');
        $slider_images = $request->file('slider_images');
        if($main_image && $slider_images){
            $old_img = $request->old_img;
        $name_gen = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
        $uploads = 'images/product/';
        $last_img = $uploads . $name_gen;
        Image::make($main_image)->resize(270,270)->save($last_img);
            $up = Product::find($id);
            $up->product_name = $request->product_name;
            $up->cat_id = $request->cat_id;
            $up->brand_id = $request->brand_id;
            $up->price = $request->price;
            $up->quantity = $request->quantity;
            $up->short_des = $request->short_des;
            $up->long_des = $request->short_des;
            $up->main_image = $last_img;
            $up->updated_at = Carbon::now();
            $up->slug =  Str::slug($request->product_name, '-');

            if($up->save()){
                unlink($old_img);
                $id =  $up->id;
                $Slider_Images = SliderImage::where('product_id',$id)->get();
                foreach ($Slider_Images as $s_img){
                    unlink($s_img->images);
                    SliderImage::where('product_id',$id)->delete();
                }
                foreach ($slider_images as $single_img){
                    $id =  $up->id;
                    $name_gen = hexdec(uniqid()) . '.' . $single_img->getClientOriginalExtension();
                    $uploads = 'images/sliders/';
                    $last_img = $uploads . $name_gen;
                    Image::make($single_img)->resize(270,270)->save($last_img);
                    $sImg = new SliderImage();
                    $sImg->product_id = $id ;
                    $sImg->images = $last_img ;
                   $sImg->save();
                }
                return redirect('products')->with('update','Product Updated Successfully!');
            }
        }else if($main_image){
            $old_img = $request->old_img;
            $name_gen = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            $uploads = 'images/product/';
            $last_img = $uploads . $name_gen;
            Image::make($main_image)->resize(270,270)->save($last_img);
                $up = Product::find($id);
                $up->product_name = $request->product_name;
                $up->cat_id = $request->cat_id;
                $up->brand_id = $request->brand_id;
                $up->price = $request->price;
                $up->quantity = $request->quantity;
                $up->short_des = $request->short_des;
                $up->long_des = $request->short_des;
                $up->main_image = $last_img;
                $up->updated_at = Carbon::now();
                $up->slug =  Str::slug($request->product_name, '-');
                if($up->save()){
                    unlink($old_img);
                    return redirect('products')->with('update','Product Updated Successfully!'); 
                }
        }else if($slider_images){
            $up = Product::find($id);
            $up->product_name = $request->product_name;
            $up->cat_id = $request->cat_id;
            $up->brand_id = $request->brand_id;
            $up->price = $request->price;
            $up->quantity = $request->quantity;
            $up->short_des = $request->short_des;
            $up->long_des = $request->short_des;
            $up->updated_at = Carbon::now();
            $up->slug =  Str::slug($request->product_name, '-');
            if($up->save()){
                $id =  $up->id;
                $Slider_Images = SliderImage::where('product_id',$id)->get();
                foreach ($Slider_Images as $s_img){
                    unlink($s_img->images);
                    SliderImage::where('product_id',$id)->delete();
                }
                foreach ($slider_images as $single_img){
                    $id =  $up->id;
                    $name_gen = hexdec(uniqid()) . '.' . $single_img->getClientOriginalExtension();
                    $uploads = 'images/sliders/';
                    $last_img = $uploads . $name_gen;
                    Image::make($single_img)->resize(270,270)->save($last_img);
                    $sImg = new SliderImage();
                    $sImg->product_id = $id ;
                    $sImg->images = $last_img ;
                   $sImg->save();
                }
                return redirect('products')->with('update','Product Updated Successfully!');
            }
        }
        else{
            $up = Product::find($id);
            $up->product_name = $request->product_name;
            $up->cat_id = $request->cat_id;
            $up->brand_id = $request->brand_id;
            $up->price = $request->price;
            $up->quantity = $request->quantity;
            $up->short_des = $request->short_des;
            $up->long_des = $request->short_des;
            $up->updated_at = Carbon::now();
            $up->slug =  Str::slug($request->product_name, '-');
            if($up->save()){
                return redirect('products')->with('update','Product Updated Successfully!');
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
        $oldData =  Product::findorFail($id);
        $oldImg = $oldData->main_image;
         $SliderImages = SliderImage::where('product_id',$id)->get();
         $delete = Product::findorFail($id)->delete();
         if($delete){
             unlink($oldImg);
             foreach ($SliderImages as $s){
                 unlink($s->images);
                 SliderImage::findorFail($s->id)->delete();
             }
             return redirect()->back()->with('delete','Product Deleted Successfully!');
         }
    }

     public function statusActive($id)
    {
        $up = Product::findorFail($id)->update([
            "status" => 1
        ]);
        if($up){
            return redirect()->back()->with('update','Status Activated Successfully!');
        }

    }

    public function statusInActive($id)
    {
        $up = Product::findorFail($id)->update([
            "status" => 0
        ]);
        if($up){
            return redirect()->back()->with('update','Status Inctivated Successfully!');
        }

    }
}
