<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    public function loginPage(){
        return view('frontend\customer\loginpage');
    }
    public function regPage(){
        return view('frontend\customer\registration');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:customers'],
            'password' => ['required'],
        ]);
        $cus = new Customer();
      $cus->name = $request->name;
      $cus->email = $request->email;
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
        return redirect()->intended('admin');
    }else{
        return redirect()->back()->with('error','Invalid');
    }
    }

     public function index()
    {
        return 'hi admin';
    }
}