@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Thông tin quản lý</h1>

<!-- Register form -->
<div class="card shadow mb-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        @php
                            $process = "Chỉnh sửa";
                            $currentUri = Route::current()->uri();
                            if($currentUri == "admin/users/create")
                                $process = "Tạo mới";
                        @endphp
                        <h1 class="h4 text-gray-900 mb-4">{{ $process }} thông tin người dùng!</h1>
                    </div>
                    @if(Request::get("notify") != "" && Request::get("notify") == "email-exists")
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 mb-3 mb-sm-0">
                                <div class="alert alert-danger">Email đã tồn tại, vui lòng nhập email khác</div>
                            </div>
                        </div>
                    @endif
                    <form class="user" method="post" action="{{ $action }}">
                        @csrf

                        <!-- name -->
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 mb-3 mb-sm-0">
                                <input type="text" name="name" class="form-control form-control-user" value="{{ isset($record->name)?$record->name:'' }}" placeholder="Name" required>
                            </div>
                        </div>

                        <!-- email -->
                        @php
                            $disabled = "";
                            if(isset($record->email))
                                $disabled = "disabled";
                        @endphp
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 mb-3 mb-sm-0">
                                <input type="email" name="email" class="form-control form-control-user" value="{{ isset($record->email)?$record->email:'' }}" placeholder="Email"  {{ $disabled }} required>
                            </div>
                        </div>

                        <!-- password -->
                        @php
                            $placeholder = "Password";
                            $required = "";
                            if(isset($record->email))
                                $placeholder = "Không đổi password thì không nhập thông tin vào ô textbox này";
                            else
                                $required = "required";
                        @endphp
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="{{ $placeholder }}" {{ $required }}>
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="form-group row justify-content-center">
                                <input type="submit" class="mb-3 mb-sm-0 btn btn-info btn-user" value="{{ $process }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection