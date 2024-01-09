@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<?php
	use App\ShoppingCart\Cart;
?>
@if(Cart::cartNumber() > 0)
<!-- main begin -->
<main class="mainContainer_theme">
    <div class="breadcrumb-shop clearfix">
        <div class="container-fluid">
            <div class="">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li>
                        <a href="{{ url('') }}"><span>Trang chủ</span></a>
                    </li>
                    <li class="active">
                        <span>Giỏ hàng ({{ Cart::cartNumber() }})</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div id="layout-cart">
        <div class="container-fluid">
            <div class="row pd-page">
                <div class="col-md-12 col-xs-12 heading-page">
                    <div class="header-page">
                        <h1>Giỏ hàng của bạn</h1>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-8 wrapbox-content-cart-new">
                    <div class="cart-container">
                        <div class="cart-col-left">
                            <div class="main-content-cart">
                                <form action="{{ url('cart/update') }}" method="post" id="cartformpage">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="title-number-cart">
                                                <p class="count-cart">Bạn đang có <span>{{ Cart::cartNumber() }} sản phẩm </span>trong giỏ hàng</p>
                                            </div>
                                            <table class="table-cart">
                                                <tbody>
                                                    @foreach(Session::get("cart") as $item)
                                                    <tr class="line-item-container">
                                                        <td class="image">
                                                            <div class="product_image">
                                                                <a href="{{ url('products/detail/'.$item['id']) }}">
                                                                    <img src="{{ asset('upload/products/'.$item['photo']) }}">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="item">
                                                            <a href="{{ url('products/detail/'.$item['id']) }}">
                                                                <h3>{{ $item['name'] }}</h3>
                                                            </a>
                                                            <p style="margin-bottom: 0;margin-top: 6px;">Size:</p>
                                                            <p>
                                                                <span>{{ number_format($item['price'] - ($item['price']*$item['discount'])/100) }}₫</span>
                                                                <del>({{ number_format($item['price']) }}₫)</del>
                                                            </p>
                                                            <p class="variant"></p>
                                                            <div class="qty quantity-partent qty-click clearfix">
                                                                <button type="button" class="qtyminus qty-btn">-</button>
                                                                <input type="text" size="4" name="product_{{ $item['id'] }}" min="1" value="{{ $item['quantity'] }}" class="tc line-item-qty item-quantity" required="Không thể để trống">
                                                                <button type="button" class="qtyplus qty-btn">+</button>
                                                            </div>
                                                            <p class="price">
                                                                <span class="text">Thành tiền:</span>
                                                                <span class="line-item-total">{{ number_format(($item['price'] - ($item['price']*$item['discount'])/100) * $item['quantity']) }}₫</span>
                                                            </p>
                                                        </td>
                                                        <td class="remove">
                                                            <a href="{{ url('cart/remove/'.$item['id']) }}" class="cart" title="Xóa sản phẩm này">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="cart-buttons">
                                        <a class="btn-destroy button drakpay" href="{{ url('cart/destroy') }}" title="Xóa toàn bộ giỏ hàng">Xóa toàn bộ</a>
                                        <button type="submit" class="btn-update button dark">Cập nhật</button>
                                    </div>
                                    <div class="pd_note not-mr">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="checkout-note clearfix">
                                                    <label for="note" class="note-label">Ghi chú đơn hàng</label>
                                                    <textarea id="note" name="note" rows="8" cols="50"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 hidden-xs">
                                                <div class="policy_return">
                                                    <h2>Chính sách mua hàng</h2>
                                                    <ul>
                                                        <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                                        <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                                        <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống</li>
                                                        <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>				
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4 sidebarCart-sticky">
                    <div class="wrapbox-order-cart">
                        <div class="order_cart_block">
                            <div class="order_title">
                                <h3>Thông tin đơn hàng </h3>
                            </div>
                            <div class="order_total_price">
                                <p>Tổng tiền:<span>{{ number_format(Cart::cartTotal()) }}₫</span></p>
                            </div>
                            <p class="note-promo">Phí vận chuyển sẽ được tính ở trang thanh toán.<br>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                            <div class="order_cart_action">
                                <div class="cart-buttons">
                                    <a href="{{ url('cart/bill') }}" class="checkout-btn" name="checkout" value="">Thanh toán</a>
                                </div>
                            </div>
                            <a class="countine_order_cart" href="{{ url('products/category/all') }}" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main end -->
@else
<main class="mainContainer_theme">
    <div class="breadcrumb-shop clearfix">
        <div class="container-fluid">
            <div class="">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li>
                        <a href="{{ url('') }}"><span>Trang chủ</span></a>
                    </li>
                    <li class="active">
                        <span>Giỏ hàng ({{ Cart::cartNumber() }})</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div id="layout-cart">
        <div class="container-fluid">
            <div class="row pd-page">
                <div class="col-md-12 col-xs-12 heading-page">
                    <div class="header-page">
                        <h1>Giỏ hàng của bạn</h1>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-8 wrapbox-content-cart-new">
                    <div class="span12 expanded-message">Giỏ hàng của bạn đang trống</div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4 sidebarCart-sticky">
                    <div class="wrapbox-order-cart">
                        <div class="order_cart_block">
                            <div class="order_title">
                                <h3>Thông tin đơn hàng </h3>
                            </div>
                            <div class="order_total_price">
                                <p>Tổng tiền:<span>0₫</span></p>
                            </div>
                            <p class="note-promo">Phí vận chuyển sẽ được tính ở trang thanh toán.<br>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                            <div class="order_cart_action">
                                <div class="cart-buttons">
                                    <a href="javascript:;" class="checkout-btn" value="">Thanh toán</a>
                                </div>
                            </div>
                            <a class="countine_order_cart" href="{{ url('products/category/all') }}" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endif
@endsection
