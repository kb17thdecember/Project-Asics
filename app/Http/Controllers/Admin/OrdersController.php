<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //danh sách đơn hàng
    public function read(){
        $data = DB::table("orders")->orderBy("id","desc")->paginate();
        return view("admin.orders.read",["data"=>$data]);
    }
    //chi tiết đơn hàng
    public function detail($id){
        //lấy đơn hàng
        $order = DB::table("orders")->where("id","=",$id)->first();
        //lấy thông tin khách hàng
        $customer = DB::table("customers")->where("id","=",$order->customer_id)->first();
        //lấy danh sách các sản phẩm thuộc đơn hàng
        $products = DB::table("order_details")->where("order_id","=",$order->id)->join("products","products.id","=","order_details.product_id")->select("products.name","products.photo","products.discount","order_details.quantity","order_details.price")->get();
        return view("admin.orders.detail",["order"=>$order,"customer"=>$customer,"products"=>$products]);
    }
    //cập nhật tình trạng đơn hàng từ chưa giao hàng thành đã giao hàng
    public function update($id){
        DB::table("orders")->where("id","=",$id)->update(["status"=>1]);
        return redirect(url('admin/orders'));
    }
}
