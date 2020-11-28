<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use function ucwords;
use function view;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Slider';
    }

    public function index(){
        $this->data['sliders'] = Slider::latest()->get();
        return view('backend.slider.index',$this->data);
    }
    public function store(Request $request){

        $request->validate([
            'txt_1' => 'required',
            'txt_2' => ['required'],
            'txt_3' => 'required',
            'txt_4' => 'required',
            'image' => ['required','mimes:png,jpg,jpeg']
        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $uploads = 'images/hero/';
        $last_img = $uploads . $name_gen;
        Image::make($image)->resize(1040,840)->save($last_img);
        $insert = Slider::insert([
            "text_1" => ucwords($request->input('txt_1')),
            "text_2" => ucwords($request->input('txt_2')),
            "text_3" => ucwords($request->input('txt_3')),
            "text_4" => ucwords($request->input('txt_4')),
            "image" => $last_img,
            "created_at" => Carbon::now()
        ]);
        if($insert){
            return Redirect()->back()->with("insert",'Slider Added Successfully!!');
        }
    }

    public function update(Request $request,$id){

        $request->validate([
            'text_1' => 'required',
            'text_2' => ['required'],
            'text_3' => 'required',
            'text_4' => 'required'
        ]);
        $image = $request->file('cat_img');
        if($image){
            $old_img = $request->old_img;
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $uploads = 'images/hero/';
            $last_img = $uploads . $name_gen;
            Image::make($image)->resize(1040,840)->save($last_img);

            $update =Slider::findorFail($id)->update([
                "text_1" => ucwords($request->input('text_1')),
                "text_2" => ucwords($request->input('text_2')),
                "text_3" => ucwords($request->input('text_3')),
                "text_4" => ucwords($request->input('text_4')),
                "image" => $last_img,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                unlink($old_img);
                return Redirect()->back()->with("update",'Category Updated Successfully!!');
            }
        }else{
            $update =Slider::findorFail($id)->update([
                "text_1" => ucwords($request->input('text_1')),
                "text_2" => ucwords($request->input('text_2')),
                "text_3" => ucwords($request->input('text_3')),
                "text_4" => ucwords($request->input('text_4')),
                'updated_at' => Carbon::now()
            ]);
            if($update){
                return Redirect()->back()->with("update",'Slider Updated Successfully!!');
            }
        }
    }

    public function delete($id)
    {
        $oldData =  Slider::findorFail($id);
        $oldImg = $oldData->image;
        $delete = Slider::findorFail($id)->delete();
        if($delete){
            unlink($oldImg);
            return Redirect()->back()->with("delete",'Slider Deleted Successfully!!');
        }
    }

}
