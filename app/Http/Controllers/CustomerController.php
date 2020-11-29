<?php

namespace App\Http\Controllers;

use const AF_UNIX;
use App\Admin;
use App\Customer;
use App\Models\OrderItem;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\SiteIdentity;
use App\Models\SocialLink;
use Intervention\Image\ImageManagerStatic as Image;
use function redirect;
use function view;

class CustomerController extends Controller
{
    public function loginPage(){
        if(Auth::check() && Auth::user()->userTye == 'customer'){
            return redirect()->back();
        }
        $data= [];
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend\customer\loginpage',compact('data'));
    }
    public function regPage(){
        $data= [];
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend\customer\registration',compact('data'));
    }

    public function store(Request $request){
        //return $request->file('image');
        $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:admins'],
            'password' => ['required'],
            'image' =>['required','mimes:jpg,jpeg,png']
        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $uploads = 'images/admin/';
        $last_img = $uploads . $name_gen;
        Image::make($image)->resize(270,270)->save($last_img);
        $cus = new Admin();
        $cus->name = $request->name;
        $cus->email = $request->email;
        $cus->image = $last_img;
        $cus->userTye = 'customer';
        $cus->password = Hash::make($request->password);
        if($cus->save()){
            return redirect('customer.login')->with('success','You may login now');
        }
    }


    public function Login(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        //$credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email,'password' => $password])) {

            if(Auth::user()->userTye == 'customer'){
                return redirect()->route('cus/home');
            }else{
                return redirect()->intended('admin');
            }
        }else{
            return redirect()->back()->with('error','Invalid Email or Password!');
        }
    }
    public function index(){
        $data= [];
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        $data['orderItms'] = OrderItem::where('admin_id',Auth::user()->id)
            ->where('status','!=',4)->get();
        return view('frontend.customer.home',compact('data'));
    }
}