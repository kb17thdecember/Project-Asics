<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    //read
    public function read(Request $request){
        $key = $request->get("key");
        $data = Products::where("name","like","%$key%")->orderBy("id","desc")->paginate();
        return view("admin.products.read",["data"=>$data]);
    }

    //update
    public function update($id){
        $record = Products::where("id","=",$id)->first();
        $action = url("admin/products/update-post/$id");
        return view("admin.products.form",["record"=>$record,"action"=>$action]);
    }

    //update-post
    public function updatePost(Request $request,$id){
        $name = $request->get("name");
        $category_id = $request->get("category_id");
        $hot = $request->get("hot") != "" ? 1 : 0;
        $price = $request->get("price");
        $discount = $request->get("discount");
        $description = $request->get("description");
        $content = $request->get("content");
        Products::where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"hot"=>$hot,"price"=>$price,"discount"=>$discount,"description"=>$description,"content"=>$content]);
        if($request->hasFile("photo")){
            $old_photo = Products::where("id","=",$id)->first();
            if($old_photo->photo != null && file_exists("upload/products/".$old_photo->photo))
                unlink("upload/products/".$old_photo->photo);
            $photo = time()."_". $request->file("photo")->getClientOriginalName();
            $request->file("photo")->move("upload/products",$photo);
            Products::where("id","=",$id)->update(["photo"=>$photo]);
        }
        return redirect(url("admin/products"));
    }

    //create
    public function create(){
        $action = url("admin/products/create-post");
        return view("admin.products.form",["action"=>$action]);
    }

    //create-post
    public function createPost(Request $request){
        $name = $request->get("name");
        $category_id = $request->get("category_id");
        $hot = $request->get("hot") != "" ? 1 : 0;
        $price = $request->get("price");
        $discount = $request->get("discount");
        $description = $request->get("description");
        $content = $request->get("content");
        $photo = "";
        if($request->hasFile("photo")){
            $photo = time()."_". $request->file("photo")->getClientOriginalName();
            $request->file("photo")->move("upload/products",$photo);
        }
        Products::insert(["name"=>$name,"category_id"=>$category_id,"hot"=>$hot,"price"=>$price,"discount"=>$discount,"description"=>$description,"content"=>$content,"photo"=>$photo]);
        return redirect(url("admin/products"));   
    }

    //delete
    public function delete($id){
        $old_photo = Products::where("id","=",$id)->first();
        if($old_photo->photo != null && file_exists("upload/products/".$old_photo->photo))
            unlink("upload/products/".$old_photo->photo);
        $record = Products::where("id","=",$id)->delete();
        return redirect(url("admin/products"));
    }
}
