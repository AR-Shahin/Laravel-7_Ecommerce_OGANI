<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\SliderImage;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\SiteIdentity;
use Illuminate\Support\Facades\DB;
use function response;
use function view;

class ClientController extends Controller
{
    public function index(){
        $data = [];
        $data['cats'] = Category::orderBy('id','desc')->get();
        $data['catwise_products'] = Product::where('status',1)
            ->inRandomOrder()
            ->take(8)
            ->latest()
            ->get();
        $data['latest_products'] = Product::where('status',1)
            ->take(3)
            ->latest()
            ->get();
        $max = $data['max'] = Product::max('count');
        $low = $max -5;
        $data['top_products'] = Product::whereBetween('count', [$low, $max])
            //->max('count')
            ->where('status',1)
            ->take(3)
            ->inRandomOrder()
            ->get();
        $data['cartProduct'] = Cart::count('id');
        $data['sliders'] = Slider::latest()->get();
        $data['rands'] = Product::where('status',1)
            ->take(3)
            ->inRandomOrder()
            ->get();
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend.home',compact('data'));
    }
    public function shop(){
        $data = [];
        $data['cats'] = Category::orderBy('id','desc')->get();
       $data['products_slider'] = Product::where('status',1)
            ->orderBy('id', 'asc')
            ->get();
        $data['products'] = Product::where('status',1)
            // ->where('quantity','>',0)
            ->orderBy('id', 'desc')
            ->paginate(12);
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        $data['count'] = Product::where('status',1)->get()->count();
        return view('frontend.shop',compact('data'));
    }
    public function singleProduct($slug){
        $data = [];
        $data['product'] = Product::where('slug',$slug)->first();
        $id = $data['product']->id;
        $cat_id = $data['product']->cat_id;
        $count = $data['product']->count;
        $count ++;
        Product::findorFail($id)->update([ "count" => $count]);
        $data['count_similar_product'] = Product::where('cat_id',$cat_id)
            ->where('id' ,'!=',$id)
            ->where('status',1)
            ->count();
        $data['slider_images'] = SliderImage::where('product_id',$id)->get();
        $data['related_products'] = Product::where('cat_id',$cat_id)
            ->where('id' ,'!=',$id)
            ->where('status',1)
            ->inRandomOrder()
            ->take(4)
            ->get();
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend.singleProduct',compact('data'));
    }

    public function catWiseProduct($catName)
    {

        $all = Category::where('cat_name',$catName)->first();
        $cid = $all->id;
        $data =[];
        $data['cats'] = Category::orderBy('id','desc')->get();
        $data['catName'] = $catName;
        $data['products'] = Product::where('status',1)
            ->where('cat_id',$cid)
            ->orderBy('id', 'desc')
            ->paginate(9);
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend.cat_wise_product',compact('data'));
    }

    public function checkout(){
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        return view('frontend.chekout');
    }

    public function searchProductFromHome(Request $request){
        $data['site'] = SiteIdentity::get()->first();
        $data['link'] = SocialLink::get()->first();
        $data['product'] = Product::where('product_name',$request->name)
            ->where('status',1)
            ->first();
        if($data['product']) {
            $data['slider_images'] = SliderImage::where('product_id', $data['product']->id)->get();
            $data['related_products'] = Product::where('cat_id', $data['product']->cat_id)
                ->where('id', '!=', $data['product']->id)
                ->where('status', 1)
                ->inRandomOrder()
                ->take(4)
                ->get();
            $data['count_similar_product'] = Product::where('cat_id',$data['product']->cat_id)
                ->where('id' ,'!=',$data['product']->id)
                ->where('status',1)
                ->count();
            return view('frontend.searchProduct',compact('data'));
        }else{
            $data['notFound'] = $request->name;
            return view('frontend.notFound',compact('data'));
        }
    }

}
