<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function login()
    {
        return view("frontend.customers.form_login");
    }

    public function loginPost()
    {
        $email = request()->get("email");
        $password = request()->get("password");
        $record = DB::table("customers")->where("email","=",$email)->first();
        if(isset($record->email)){
            if(Hash::check($password,$record->password)){
                session()->put("customer_name",$record->name);
                session()->put("customer_email",$record->email);
                session()->put("customer_id",$record->id);
                return redirect()->back();
            }
        }
        // Xác thực thất bại, chuyển hướng về trang trước đó với thông báo chi tiết
        return redirect(url('customers/login'))->with('notify', 'Đăng nhập không thành công. Vui lòng thử lại.');
    }

    public function register()
    {
        return view("frontend.customers.form_register");
    }

    public function registerPost(){
        $email = request()->get("email");
        $password = request()->get("password");
        $password = Hash::make($password);
        $name = request()->get("name");
        $phone = request()->get("phone");
        $address = request()->get("address");
        //kiểm tra xem email đã tồn tại chưa, nếu chưa thì mới cho insert
        $check = DB::table("customers")->where("email","=",$email)->first();
        if(!isset($check->email)){
            DB::table("customers")->insert(["email"=>$email,"name"=>$name,'password'=>$password,'phone'=>$phone,'address'=>$address]);
        }
        else{
            // Nếu email đã tồn tại, thông báo lỗi
            return redirect()->back()->with('notify', 'Email đã tồn tại.');
        }
        return redirect(url(''));
    }

    public function logout(){
        session()->remove("customer_name");
        session()->remove("customer_email");
        session()->remove("customer_id");
        return redirect()->back();
    }
}
