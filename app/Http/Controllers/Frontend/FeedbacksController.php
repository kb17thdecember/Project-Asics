<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FeedbacksController extends Controller
{

    public function createPost(){
        $content = $request()->get("f-content");
        //kiểm tra xem email đã tồn tại chưa, nếu chưa thì mới cho insert
        return redirect(url(''));
    }
}
