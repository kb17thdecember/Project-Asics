{{-- kiểm tra quyền truy cập view này --}}
@if (Auth::user()->permission != "Admin")
    <script>
        location.href='{{  url('admin/home?notify=not-permit')  }}';
    </script>
@endif
@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tài khoản khách hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ asset('admin/customers/create') }}" class="btn btn-info"><i class="fa-solid fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{  $row->address  }}</td>
                        <td>{{  $row->phone  }}</td>
                        <td>
                            <a href="{{ asset('admin/customers/update/'.$row->id) }}" style="position: relative; left: 15px" class="btn btn-info btn-sm"><i class="fa-solid fa-user-pen"></i></a>&nbsp;
                            <a href="{{ asset('admin/customers/delete/'.$row->id) }}" style="position: relative; left: 15px" class="btn btn-success btn-sm" onclick="return window.confirm('Bạn chắc chắn muốn xóa ?');"><i class="fa-solid fa-user-minus"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection