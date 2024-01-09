<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function all(Request $request){
        $order = $request->get("order");
        $rows = DB::table("products")->orderBy("id","desc")->paginate(50);
        switch ($order) {
            case 'price_asc':
                $rows = DB::table("products")->orderBy("price","asc")->paginate(50);
                break;
            case 'price_desc':
                $rows = DB::table("products")->orderBy("price","desc")->paginate(50);
                break;
            case 'name_asc':
                $rows = DB::table("products")->orderBy("name","asc")->paginate(50);
                break;
            case 'name_desc':
                $rows = DB::table("products")->orderBy("name","desc")->paginate(50);
                break;
        }
        return view("frontend.products.all",["rows"=>$rows,"order"=>$order]);
    }

    public function category(Request $request,$id){
        $order = $request->get("order");
        $rows = DB::table("products")->where("category_id","=",$id)->paginate(50);
        switch ($order) {
            case 'price_asc':
                $rows = DB::table("products")->where("category_id","=",$id)->orderBy("price","asc")->paginate(50);
                break;
            case 'price_desc':
                $rows = DB::table("products")->where("category_id","=",$id)->orderBy("price","desc")->paginate(50);
                break;
            case 'name_asc':
                $rows = DB::table("products")->where("category_id","=",$id)->orderBy("name","asc")->paginate(50);
                break;
            case 'name_desc':
                $rows = DB::table("products")->where("category_id","=",$id)->orderBy("name","desc")->paginate(50);
                break;
        }
        return view("frontend.products.category",["rows"=>$rows,"category_id"=>$id,"order"=>$order]);
    }

    //chi tiet san pham
    public function detail(Request $request,$id){
        $record = DB::table("products")->where("id","=",$id)->first();
        $category = DB::table("categories")->where("id","=",$record->category_id)->first();
        $category_name = isset($category->name) ? $category->name : "";
        $category_id = isset($category->id) ? $category->id : "";
        return view("frontend.products.detail",["record"=>$record,"category_name"=>$category_name,"category_id"=>$category_id]);
    }

    //đánh số sao sản phẩm
    public function rate(Request $request,$id){
        $star = $request->get("star");
        DB::table("rating")->insert(["product_id"=>$id,"star"=>$star]);
        return redirect(url("products/detail/$id"));
    }

    //tìm kiếm theo tên sản phẩm
    public function searchName(Request $request){
        $key = $request->get("key");
        $rows = DB::table("products")->where("name","like","%$key%")->orderBy("id","desc")->paginate(50);
        return view("frontend.products.search_name",["key"=>$key,"rows"=>$rows]);
    }
    // tìm kiếm theo jquery
    public function searchAjax(Request $request){
        $key = $request->get("key");
        $rows = DB::table("products")->where("name","like","%$key%")->orderBy("id","desc")->skip(0)->take(10)->get();
        $count = 0;
        $str = "";
        foreach($rows as $row){
            if($count < 5){
                if($row->discount == 0){
                    $price = '';
                }else{
                    $price = '<del>'.number_format($row->price).'₫</del>';
                }
                $str .= '
                    <div class="item-ult">
                        <div class="title">
                            <a href="'.url("products/detail/".$row->id).'">'.$row->name.'</a>
                            <p class="f-initial">'.number_format($row->price - ($row->price * $row->discount)/100).'₫
                                '.$price.'
                            </p>
                        </div>
                        <div class="thumbs">
                            <a href="'.url("products/detail/".$row->id).'">
                                <img src="'.asset('upload/products/'.$row->photo).'">
                            </a>
                        </div>
                    </div>
                ';
                $count++;
            }else{
                $str .= '<div class="resultsMore"><a href="'.url("products/search-name")."?key=".$key.'">Xem thêm sản phẩm</a></div>';
                break;
            }
        }
        echo $str;
    }
}
