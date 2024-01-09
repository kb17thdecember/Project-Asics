<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function all(Request $request){
        $rows = DB::table("news")->orderBy("id","desc")->get();
        $news_topic = DB::table("news")->orderBy("id","desc")->paginate(5);
        return view("frontend.blogs.news",["rows"=>$rows,"news_topic"=>$news_topic]);
    }

    public function topic(Request $request,$id){
        $topic = DB::table("news")->where("id","=",$id)->first();
        $news_topic = DB::table("news")->orderBy("id","desc")->paginate(5);
        return view("frontend.blogs.topic",["topic"=>$topic,"news_topic"=>$news_topic]);
    }
}
