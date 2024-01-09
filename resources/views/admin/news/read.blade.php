@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">News</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ asset('admin/news/create') }}" class="btn btn-info">Thêm tin tức</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Hot</th>
                        <td>Action</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Hot</th>
                        <td>Action</td>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td style="width: 160px;">
                            @if($row->photo != null && file_exists('upload/news/'.$row->photo))
                                <img src="{{ asset('upload/news/'.$row->photo) }}" style="width: 160px;">
                            @endif
                        </td>
                        <td style="width: 530px">{{ $row->name }}</td>
                        <td>
                            @if($row->hot == 1)
                                <span class="fas fa-check"></span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ asset('admin/news/update/'.$row->id) }}" class="btn btn-info btn-sm">Sửa</a>&nbsp;
                            <a href="{{ asset('admin/news/delete/'.$row->id) }}" class="btn btn-success btn-sm" onclick="return window.confirm('Are you sure ?');">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection