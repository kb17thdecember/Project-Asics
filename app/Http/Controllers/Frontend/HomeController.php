<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function read(){
        // lấy 10 sản phẩm mới
        $hot_products = DB::table("products")->where("hot","=","1")->offset(3)->take(10)->get();
        // lấy các danh mục hiển thị ở trang chủ(display_at_home_page=1)
        $categories = DB::table("categories")->where("display_at_home_page","=","1")->orderBy("id","desc")->get();
        // lấy 3 tin tức
        $news = DB::table("news")->where("hot","=","1")->orderBy("id","desc")->offset(0)->take(3)->get();
        return view("frontend.home.read",["hot_products"=>$hot_products,"categories"=>$categories,"news"=>$news]);
    }
}
