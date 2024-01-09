@extends("admin.layout")
@section("append-du-lieu-view")

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ url('admin/orders') }}" class="btn btn-info">Trở lại</a>
        @if ($order->status == 0)
        <a href="{{ url('admin/orders/update/'.$order->id) }}" class="btn btn-info">Giao hàng</a>
        @endif
    </div>
    <div class="card-body">
        <h3>Thông tin</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 200px;">Tên khách hàng</td>
                    <td>{{ isset($customer->name) ? $customer->name : "" }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ isset($customer->email) ? $customer->email : "" }}</td>
                </tr>
                <tr>
                    <td>Thời gian</td>
                    <td>{{ isset($order->date) ? date("d/m/Y", strtotime($order->date)) : "" }}</td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td>{{ isset($order->price) ? number_format($order->price)."đ" : "" }}</td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    @if ($order->status == 1)
                    <td style="color: red;">Đã giao hàng</td>
                    @else
                    <td>Chưa giao hàng</td>
                    @endif

                </tr>
            </table>
        </div>

        <h3>Sản phẩm đã đặt</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 100px;">Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <td>Giảm giá</td>
                        <td>Số lượng</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $row)
                    <tr>
                        <td>
                            @if($row->photo != "" && file_exists('upload/products/'.$row->photo))
                            <img src="{{ asset('upload/products/'.$row->photo) }}" style="width: 100px;">
                            @endif
                        </td>
                        <td>{{ $row->name }}</td>
                        <td></td>
                        <td>{{ number_format($row->price) }}đ</td>
                        <td>{{ $row->discount }}%</td>
                        <td>{{ $row->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
