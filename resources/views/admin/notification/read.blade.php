@extends("admin.layout")
@section("append-thong-bao")
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        Thông báo
    </h6>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
            <div class="icon-circle bg-info">
                <i class="fas fa-file-alt text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">{{ date("d/m/Y", strtotime($row->date)) }}</div>
            <span class="font-weight-bold">{{ getCustomerName($row->customer_id) }} đã đặt đơn hàng trị giá {{ number_format($row->price) }}đ</span>
        </div>
    </a>
    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
    </li>
@endsection