<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class CustomersBController extends Controller
{
    // read
    public function read(Request $request)
    {
        $data = DB::table("customers")->orderBy("id","desc")->paginate();
        return view("admin.customers.read",["data"=>$data]);
    }

    // update
    public function update($id)
    {
        $record = DB::table("customers")->where("id","=",$id)->first();
        $action = url("admin/customers/update-post/$id");
        return view("admin.customers.form",["record"=>$record,"action"=>$action]);
    }

    // updatePost
    public function updatePost(Request $request,$id)
    {
        $name = $request->get("name");
        $password = $request->get("password");
        $address = $request->get("address");
        $phone = $request->get("phone");
        DB::table("customers")->where("id","=",$id)->update(["name"=>$name,"address"=>$address,"phone"=>$phone]);
        if($password != "")
        {
            $password = Hash::make($password);
            DB::table("customers")->where("id","=",$id)->update(["password"=>$password]);
        }
        return redirect(url("admin/customers"));
    }

    //create
    public function create(){
        $action = url("admin/customers/create-post");
        return view("admin.customers.form",["action"=>$action]);
    }

    //create-post
    public function createPost(Request $request){
        $name = $request->get("name");
        $email = $request->get("email");
        $address = $request->get("address");
        $phone = $request->get("phone");
        $password = $request->get("password");
        $password = Hash::make($password);
        $check = DB::table("customers")->where("email","=",$email)->first();
        if(isset($check->email) == false){
            DB::table("customers")->insert(["name"=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"password"=>$password]);
            return redirect(url("admin/customers"));
        }else
            return redirect(url("admin/customers/create?notify=email-exists"));    
    }
    
    //delete
    public function delete($id){
        $record = DB::table("customers")->where("id","=",$id)->delete();
        return redirect(url("admin/customers"));
    }
}
