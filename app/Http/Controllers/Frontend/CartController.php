<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//import file Cart.php vào đây
use App\ShoppingCart\Cart;
//su dung session
// use Session;

class CartController extends Controller
{
    //them san pham gio hang
    public function buy(Request $request, $id){
        $quantity = 1;
        if($request->get("quantity") != "")
            $quantity =$request->get("quantity");
        //goi ham cartAdd trong class Cart de them san pham vao gio hang
        Cart::cartAdd($id,$quantity);
        return redirect(url('cart'));
    }
    //ham hien thi danh sach cac san pham trong gio hang
    public function read(Request $request){
        // echo "<pre>";
        // print_r(Session::get('cart'));
        // echo "</pre>";
        return view('frontend.cart.read');
    }
    //xoa san pham khoi gio hang
    public function remove(Request $request, $id){
        //goi ham cartDelete trong class Cart de them san pham vao gio hang
        Cart::cartDelete($id);
        return redirect(url('cart'));
    }
    //cap nhat so luong san pham
    public function update(Request $request){
        //duyet cac phan tu trong session cart de update so luong
        foreach(Session::get('cart') as $item){
            $product_name = 'product_'.$item['id'];
            $new_quantity = $request->get($product_name);
            //goi ham cap nhat so luong san pham
            Cart::cartUpdate($item['id'],$new_quantity);
        }
        return redirect(url('cart'));
    }
    //xoa toan bo gio hang
    public function destroy(Request $request){
        Cart::cartDestroy();
        return redirect(url('cart'));
    }
    //thanh toan gio hang
    public function bill(Request $request){
        //kiem tra neu customer chua dang nhap thi di chuyen den trang dang nhap
        if(Session::get('customer_email') == "")
            return redirect(url('customers/login'));
        else{
            return view("frontend.cart.checkout");
        }
    }

    public function checkout(Request $request){
        Cart::cartOrder();
        return redirect(url(''));
    }
}
