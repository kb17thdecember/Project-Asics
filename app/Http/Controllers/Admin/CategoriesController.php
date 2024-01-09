<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    //read
    public function read(Request $request){
        $data = Categories::orderBy("id","desc")->where("parent_id","=","0")->paginate();
        return view("admin.categories.read",["data"=>$data]);
    }

    //update
    public function update($id){
        $record = Categories::where("id","=",$id)->first();
        $action = url("admin/categories/update-post/$id");
        return view("admin.categories.form",["record"=>$record,"action"=>$action]);
    }

    //update-post
    public function updatePost(Request $request,$id){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        $display_at_home_page = $request->get("display_at_home_page") != "" ? 1 : 0;
        Categories::where("id","=",$id)->update(["name"=>$name,"parent_id"=>$parent_id,"display_at_home_page"=>$display_at_home_page]);
        return redirect(url("admin/categories"));
    }

    //create
    public function create(){
        $action = url("admin/categories/create-post");
        return view("admin.categories.form",["action"=>$action]);
    }
    
    //create-post
    public function createPost(Request $request){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        $display_at_home_page = $request->get("display_at_home_page") != "" ? 1 : 0;
        Categories::insert(["name"=>$name,"parent_id"=>$parent_id,"display_at_home_page"=>$display_at_home_page]);
        return redirect(url("admin/categories"));   
    }

    //delete
    public function delete($id){
        $record = Categories::where("id","=",$id)->orWhere("parent_id","=",$id)->delete();
        return redirect(url("admin/categories"));
    }
}
