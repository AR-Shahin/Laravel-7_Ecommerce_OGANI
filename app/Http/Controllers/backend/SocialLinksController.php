<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialLink;

class SocialLinksController extends Controller
{
    public function index(){
        $this->data['count'] = SocialLink::count();
        $this->data['links'] = SocialLink::get();
        $this->data['link'] = SocialLink::get()->first();
        return view('backend.site.social', $this->data);
    }

    public function store(Request $request){
       // return $request->all();
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'fb' => 'required',
            'tw' => 'required',
            'ins' => 'required',
        ]);
        $formData =  $request->all();
        if(SocialLink::create($formData)){
            return redirect()->back()->with('insert','Added Successfully!');
        }
    }

    public function update(Request $request){
        $up = SocialLink::find($request->id)->update($request->all());
        if($up){
            return redirect()->back()->with('update','Updated Successfully!');
        }
    }
}
