<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{

    protected $redirectTo = '/admin';

    public function index(){
        return view('backend.dashboard');
    }
    public function login(){
        if(auth()->user()) return redirect()->back();

        return view('backend.admin.login');
    }
    public function registraion(){
        return view('backend.admin.registraion');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required','unique:admins'],
            'email' => ['required','unique:admins'],
            'password' => ['required','confirmed'],
            'image' => ['required','mimes:jpg,png,jpeg','max:5000'],
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $uploads = 'images/admin/';
        $last_img = $uploads . $name_gen;
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->image = $last_img;
        $admin->password = Hash::make($request->password);

        if($admin->save()){
            Image::make($image)->resize(270,270)->save($last_img);
            return redirect('e-admin')->with('success','Plz login');
        }
    }

    public function LoginProcess(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
   // $credentials = $request->only('email', 'password');
    $email = $request->email;
    $password = $request->password;
    
    if(Auth::attempt(['email' => $email,'password' => $password])) {
        return redirect()->intended('admin');
    }else{
        return redirect()->back()->with('success','Invalid');
    }
    }

    public function logout(){
        Auth::logout();
        return redirect('e-admin');
    }
}
