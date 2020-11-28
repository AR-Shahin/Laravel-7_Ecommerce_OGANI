<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteIdentity;

class WebsiteController extends Controller
{
    public function index(){
              $this->data['count'] = SiteIdentity::count();
        $this->data['siteIdentity'] = SiteIdentity::get();
        $this->data['site'] = SiteIdentity::get()->first();
        return view('backend.site.logoAndFooter', $this->data);
    }

    public function store(Request $request){
        $request->validate([
            'logo' => ['required', 'mimes:jpg,png,jpeg'],
            'top_txt' => 'required',
            'copyright' => 'required',
            'address' => 'required',
            'shop' => 'required'
        ]);

        $logo = $request->file('logo');
        $logo_ext = $logo->extension();
        $name_gen = hexdec(uniqid()) . '.' . $logo_ext;
        $last_image = 'images/site/' . $name_gen;
        $upload = 'images/site/';
        $site = new SiteIdentity();
        $site->logo = $last_image;
        $site->top_txt = $request->top_txt;
        $site->copyright = $request->copyright;
        $site->address = $request->address;
        $site->shop_name = $request->shop;
        if ($site->save()) {
            $logo->move($upload, $name_gen);
            return redirect()->back()->with("update",'Slider Updated Successfully!!');
        }
    }

    public function update(Request $request){
        //return $request->all();
        $logo = $request->file('logo');
        if ($logo) {
            $logo = $request->file('logo');
            $logo_ext = $logo->extension();
            $name_gen = hexdec(uniqid()) . '.' . $logo_ext;
            $last_image = 'images/site/' . $name_gen;
            $upload = 'images/site/';
            $site = SiteIdentity::find($request->id);
            $site->logo = $last_image;
            $site->top_txt = $request->top_txt;
            $site->copyright = $request->copyright;
            $site->address = $request->address;
            $site->shop_name = $request->shop_name;
            if ($site->save()) {
                $logo->move($upload, $name_gen);
                unlink($request->old_img);
                return redirect()->back()->with('update','Site Identity Updated Successfully!');
            }
        } else {
            $site = SiteIdentity::find($request->id);
            $site->top_txt = $request->top_txt;
            $site->copyright = $request->copyright;
            $site->address = $request->address;
            $site->shop_name = $request->shop_name;
            if ($site->save()) {
                return redirect()->back()->with('update','Site Identity Updated Successfully!');
            }
            return $request->all();
        }
    }

}
