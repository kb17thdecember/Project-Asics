@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh mục con</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ asset('admin/categories/create') }}" class="btn btn-info">Thêm danh mục</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Home page</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Home page</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>
                        @if($row->display_at_home_page == 1)
                            <span class="fas fa-check"></span>
                        @endif
                        </td>
                        <td>
                            <a href="{{ asset('admin/categories/update/'.$row->id) }}" style="position: relative; left: 70px" class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;
                            <a href="{{ asset('admin/categories/delete/'.$row->id) }}" style="position: relative; left: 70px" class="btn btn-success btn-sm" onclick="return window.confirm('Bạn chắc chắn muốn xóa ?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @php
                        $subCategories = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
                    @endphp
                    @foreach($subCategories as $rowSub)
                    <tr>
                        <td style="padding-left: 40px;">{{ $rowSub->name }}</td>
                        <td>
                        @if($rowSub->display_at_home_page == 1)
                            <span class="fas fa-check"></span>
                        @endif
                        </td>
                        <td>
                            <a href="{{ asset('admin/categories/update/'.$rowSub->id) }}" class="btn btn-warning btn-sm" style="position: relative; left: 70px"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;
                            <a href="{{ asset('admin/categories/delete/'.$rowSub->id) }}" class="btn btn-danger btn-sm" style="position: relative; left: 70px" onclick="return window.confirm('Bạn chắc chắn muốn xóa ?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection