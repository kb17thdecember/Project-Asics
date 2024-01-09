@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Products</h1>

<!-- Register form -->
<div class="card shadow mb-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5 container">
                    <div class="text-center">
                        @php
                            $process = "Edit";
                            $currentUri = Route::current()->uri();
                            if($currentUri == "admin/products/create")
                                $process = "Create";
                        @endphp
                        <h1 class="h4 text-gray-900 mb-4">{{ $process }} product</h1>
                    </div>
                    <form method="post" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        <!-- name -->
                        <div class="form-group row">
                            <label class="col-2" for="name">Tên</label>
                            <input type="text" class="form-control col-10" id="name" name="name" value="{{ isset($record->name)?$record->name:'' }}" required>
                        </div>
                        <br>

                        <!-- Category -->
                        <div class="form-group row">
                            <label class="col-2" for="category">Danh mục</label>
                            @php
                                $categories = DB::table("categories")->orderBy("id","desc")->where("parent_id","=","0")->get();
                            @endphp
                            <select name="category_id" id="category" class="form-control col-10">
                                @foreach($categories as $row)
                                    <option @if(isset($record->category_id) && $record->category_id == $row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @php
                                        $sub_categories = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
                                    @endphp         
                                        @foreach($sub_categories as $sub_row)
                                            <option @if(isset($record->category_id) && $record->category_id == $sub_row->id) selected @endif value="{{ $sub_row->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub_row->name }}</option>
                                        @endforeach                       
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <!-- Hot -->
                        <div class="form-group row">
                            <div class="col-2"></div>
                            <div class="col-10" style="padding-left: 0;">
                                <input type="checkbox" id="hot" name="hot" @if(isset($record->hot) && $record->hot == 1) checked @endif>
                                <label class="form-check-label" for="hot">Hot</label>
                            </div>
                        </div>
                        <br>

                        <!-- Price -->
                        <div class="form-group row">
                            <label class="col-2" for="price">Giá</label>
                            <input type="number" class="form-control col-10" id="price" name="price" value="{{ isset($record->price)?$record->price:'0' }}" required>
                        </div>
                        <br>

                        <!-- Discount -->
                        <div class="form-group row">
                            <label class="col-2" for="discount">Giảm giá</label>
                            <input type="number" class="form-control col-10" id="discount" name="discount" value="{{ isset($record->discount)?$record->discount:'0' }}" required>
                        </div>
                        <br>

                        <!-- Photo -->
                        <div class="form-group row">
                            <label class="col-2" for="photo">Ảnh</label>
                            <input style="padding-left: 0;" type="file" class="form-control-file col-10" id="photo" name="photo">
                        </div>
                        <br>

                        <!-- Description -->
                        <div class="form-group row">
                            <div class="col-2" for="description">Mô tả</div>
                            <div class="col-10" style="padding: 0;">
                                <textarea class="form-control" id="description" name="description">{{ isset($record->description)?$record->description:'' }}</textarea>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#description' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>    
                            </div>
                        </div>
                        <br>

                        <!-- Content -->
                        <div class="form-group row">
                            <div class="col-2" for="contentt">Nội dung</div>
                            <div class="col-10" style="padding: 0;">
                                <textarea class="form-control" id="contentt" name="content">{{ isset($record->content)?$record->content:'' }}</textarea>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#contentt' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                            </div>
                        </div>
                        <br>

                        <!-- Submit -->
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection