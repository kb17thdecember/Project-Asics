<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //read
    public function read(Request $request){
        $data = News::orderBy("id","desc")->paginate(50);
        return view("admin.news.read",["data"=>$data]);
    }

    //update
    public function update($id){
        $record = News::where("id","=",$id)->first();
        $action = url("admin/news/update-post/$id");
        return view("admin.news.form",["record"=>$record,"action"=>$action]);
    }

    //update-post
    public function updatePost(Request $request,$id){
        $name = $request->get("name");
        $hot = $request->get("hot") != "" ? 1 : 0;
        $description = $request->get("description");
        $content = $request->get("content");
        News::where("id","=",$id)->update(["name"=>$name,"hot"=>$hot,"description"=>$description,"content"=>$content]);
        if($request->hasFile("photo")){
            $old_photo = News::where("id","=",$id)->first();
            if($old_photo->photo != null && file_exists("upload/news/".$old_photo->photo))
                unlink("upload/news/".$old_photo->photo);
            $photo = time()."_". $request->file("photo")->getClientOriginalName();
            $request->file("photo")->move("upload/news",$photo);
            News::where("id","=",$id)->update(["photo"=>$photo]);
        }
        return redirect(url("admin/news"));
    }

    //create
    public function create(){
        $action = url("admin/news/create-post");
        return view("admin.news.form",["action"=>$action]);
    }

    //create-post
    public function createPost(Request $request){
        $name = $request->get("name");
        $hot = $request->get("hot") != "" ? 1 : 0;
        $description = $request->get("description");
        $content = $request->get("content");
        $photo = "";
        if($request->hasFile("photo")){
            $photo = time()."_". $request->file("photo")->getClientOriginalName();
            $request->file("photo")->move("upload/news",$photo);
        }

        //update name
        News::insert(["name"=>$name,"hot"=>$hot,"price"=>$price,"description"=>$description,"content"=>$content,"photo"=>$photo]);
        
        return redirect(url("admin/news"));   
    }

    //delete
    public function delete($id){
        $old_photo = News::where("id","=",$id)->first();
        if($old_photo->photo != null && file_exists("upload/news/".$old_photo->photo))
            unlink("upload/news/".$old_photo->photo);
        $record = News::where("id","=",$id)->delete();
        return redirect(url("admin/news"));
    }
}
