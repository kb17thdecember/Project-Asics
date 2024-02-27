<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbacksController extends Controller
{
    //danh sách phản hồi
    public function read(){
        $data = DB::table("feedbacks")->orderBy("id","desc")->paginate();
        return view("admin.feedbacks.read",["data"=>$data]);
    }
}