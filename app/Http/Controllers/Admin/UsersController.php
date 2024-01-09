<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class UsersController extends Controller
{
    // read
    public function read(Request $request)
    {
        $data = DB::table("users")->orderBy("id","desc")->paginate();
        return view("admin.users.read",["data"=>$data]);
    }

    // update
    public function update($id)
    {
        $record = DB::table("users")->where("id","=",$id)->first();
        $action = url("admin/users/update-post/$id");
        return view("admin.users.form",["record"=>$record,"action"=>$action]);
    }

    // updatePost
    public function updatePost(Request $request,$id)
    {
        $name = $request->get("name");
        $password = $request->get("password");
        DB::table("users")->where("id","=",$id)->update(["name"=>$name]);
        if($password != "")
        {
            $password = Hash::make($password);
            DB::table("users")->where("id","=",$id)->update(["password"=>$password]);
        }
        return redirect(url("admin/users"));
    }

    //create
    public function create(){
        $action = url("admin/users/create-post");
        return view("admin.users.form",["action"=>$action]);
    }

    //create-post
    public function createPost(Request $request){
        $name = $request->get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        $password = Hash::make($password);
        $check = DB::table("users")->where("email","=",$email)->first();
        if(isset($check->email) == false){
            DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$password]);
            return redirect(url("admin/users"));
        }else
            return redirect(url("admin/users/create?notify=email-exists"));    
    }
    
    //delete
    public function delete($id){
        $record = DB::table("users")->where("id","=",$id)->delete();
        return redirect(url("admin/users"));
    }
}
