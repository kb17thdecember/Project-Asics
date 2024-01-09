@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Categories</h1>

<!-- Register form -->
<div class="card shadow mb-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        @php
                            $process = "Edit";
                            $currentUri = Route::current()->uri();
                            if($currentUri == "admin/categories/create")
                                $process = "Create";
                        @endphp
                        <h1 class="h4 text-gray-900 mb-4">{{ $process }} category</h1>
                    </div>
                    <form method="post" action="{{ $action }}">
                        @csrf
                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2">Tên</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
                            </div>
                        </div>
                        <!-- end rows -->

                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2">Phân loại</div>
                            <div class="col-md-10">
                                @php
                                    if(isset($record->id))
                                        $categories = DB::table("categories")->where("parent_id","=","0")->where("id","<>",$record->id)->orderBy("id","desc")->get();
                                    else
                                        $categories = DB::table("categories")->where("parent_id","=","0")->orderBy("id","desc")->get();
                                @endphp
                                <select name="parent_id" class="form-control" style="width:250px;">
                                    <option value="0"></option>
                                    @foreach($categories as $row)
                                    <option @if(isset($record->parent_id) && $record->parent_id == $row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end rows -->   

                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <input type="checkbox" id="display_at_home_page" @if(isset($record->display_at_home_page) && $record->display_at_home_page == 1) checked @endif name="display_at_home_page"> <label for="display_at_home_page">Hiển thị tại trang chính</label>
                            </div>
                        </div>
                        <!-- end rows -->    

                        <!-- rows -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <input type="submit" value="{{ $process }}" class="btn btn-info">
                            </div>
                        </div>
                        <!-- end rows -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection