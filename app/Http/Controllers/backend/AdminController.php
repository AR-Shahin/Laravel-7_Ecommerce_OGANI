<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\ChangePassword;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Product;
use Error;
use function file_exists;
use function fileExists;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use function redirect;
use function view;


class AdminController extends Controller
{

    protected $redirectTo = '/admin';

    public function index(){
        $this->data['category'] = Category::all()->count();
        $this->data['product'] = Product::all()->count();
        $this->data['coupon'] = Coupon::all()->count();
        $this->data['Available_product'] = Product::pluck('quantity')->sum();
        $this->data['brand'] = Brand::all()->count();
        $this->data['order'] = OrderItem::all()->count();
        $this->data['New_order'] = OrderItem::where('status',0)->count();
        return view('backend.dashboard',$this->data);
    }
    public function login(){
        if(@auth()->user()->userTye == 'admin'){
            return redirect()->back();
        }
        return view('backend.admin.login');
    }
    public function registraion(){
        return view('backend.admin.add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
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
        $admin->userTye = 'admin';
        $admin->password = Hash::make($request->password);

        if($admin->save()){
            //Image::make($image)->resize(270,270)->save($last_img);
            $image->move(public_path('images/admin/'), $last_img);
            return redirect()->route('view.admin')->with('insert','New Admin Added Successfully!');
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
            return redirect()->back()->with('success','Invalid email or pass!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('e-admin');
    }
    public function logout_cus(){
        Auth::logout();
        return redirect()->route('cus.log');
    }

    public function allAdminsBackend(){
        $this->data['admins'] = Admin::where('userTye','admin')->latest()->get();
        return view('backend.admin.view',$this->data);
    }

    public function viewProfile(){
        $this->data['admin'] = Admin::where('userTye','admin')->where('id',Auth::user()->id)->first();
        return view('backend.admin.profile',$this->data);
    }

    public function updateProfile(){
        $this->data['admin'] = Admin::find(Auth::user()->id);
        return view('backend.admin.update',$this->data);
    }
    public function updateProfileAdmin(Request $request){
        $image = $request->file('image');
        if ($image) {
            $old_image = $request->old_image;
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload = 'uploads/admin/';
            $last_image = $upload . $img_name;

            $update = Admin::findorFail(Auth::user()->id)->update([
                'name' => ucwords($request->name),
                'image' => $last_image,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                $image->move($upload,$img_name);
                unlink($old_image);
            }
        }else{
            $update = Admin::findorFail(Auth::user()->id)->update([
                'name' => ucwords($request->name),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('view.profile')->with('insert','Profile Updated Successfully!');
    }
    public function changePassword(ChangePassword $request){
        $db_pass = Auth::user()->getAuthPassword();
        $new_pass = $request->password;
        $old_pass = $request->old_pass;
        if(Hash::check($old_pass,$db_pass)){
            $update = Admin::find(Auth::user()->id)->update([
                'password'=>Hash::make($new_pass),
                'updated_at' => Carbon::now()
            ]);
            if($update)
            {
                Auth::logout();
                return Redirect()->route('e-admin')->with('success','Password has Changed! You have to login now!!');
            }
        }else{
            return redirect()->back()->with('error','Something wrong!');
        }
    }

    public function deleteAdmin($id){
        $ob = Admin::findorFail($id);
        $img = $ob->image;
        $update = Admin::findorFail($id)->delete();
        if($update){
            if(file_exists($img)){
                unlink($img);
            }
            return redirect()->back()->with('insert','Deleted Admin Successfully!');
        }
    }
}
