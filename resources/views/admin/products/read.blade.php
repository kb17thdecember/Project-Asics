@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ asset('admin/products/create') }}" class="btn btn-info">Thêm sản phẩm</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá cả</th>
                        <th>Giảm giá</th>
                        <th>Hot</th>
                        <td>Action</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá cả</th>
                        <th>Giảm giá</th>
                        <th>Hot</th>
                        <td>Action</td>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td style="width: 90px;">
                            @if($row->photo != null && file_exists('upload/products/'.$row->photo))
                                <img src="{{ asset('upload/products/'.$row->photo) }}" style="width: 90px;">
                            @endif
                        </td>
                        <td style="width: 250px">{{ $row->name }}</td>
                        <td>
                            @php
                                $category = DB::table("categories")->where("id","=",$row->category_id)->first();
                            @endphp
                            {{ isset($category->name) ? $category->name : "" }}
                        </td>
                        <td>{{ number_format($row->price) }} vnđ</td>
                        <td>{{ $row->discount }} %</td>
                        <td>
                            @if($row->hot == 1)
                                <span class="fas fa-check"></span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ asset('admin/products/update/'.$row->id) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;
                            <a href="{{ asset('admin/products/delete/'.$row->id) }}" class="btn btn-success btn-sm" onclick="return window.confirm('Bạn chắc chắn muốn xóa ?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection