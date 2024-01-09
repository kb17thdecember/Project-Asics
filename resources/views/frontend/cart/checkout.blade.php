<!DOCTYPE html>
<html lang="en" class="flexbox">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asics - Thanh toán đơn hàng</title>
    <link rel="stylesheet" href="{{ asset('frontend/fonts/quicksand/css/Quicksand_300,400,500,700.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/sass/css/checkout.css') }}">
</head>
<body>
<?php
	use App\ShoppingCart\Cart;
?>
    <div class="content">
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list">
                                <table class="product-table">
                                    <tbody>
                                        @foreach(Session::get("cart") as $item)
                                        <tr class="product">
                                            <td class="product-image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail-wrapper">
                                                        <img class="product-thumbnail-image" alt="{{ $item['name'] }}" src="{{ asset('upload/products/'.$item['photo']) }}">
                                                    </div>
                                                    <span class="product-thumbnail-quantity">{{ $item['quantity'] }}</span>
                                                </div>
                                            </td>
                                            <td class="product-description">
                                                <span class="product-description-name order-summary-emphasis">{{ $item['name'] }}</span>
                                                <p>Size:</p>
                                            </td>
                                            <td class="product-price">
                                                <span class="order-summary-emphasis">{{ number_format(($item['price'] - ($item['price'] * $item['discount'])/100) * $item['quantity']) }}₫</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary-section order-summary-section-discount">
                                <form id="form_discount_add" method="post">
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input" type="text" id="discount.code" name="discount.code" value="">
                                                </div>
                                                <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines">
                                <table class="total-line-table">
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis">{{ number_format(Cart::cartTotal()) }}₫</span>
                                            </td>
                                        </tr>
                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Phí vận chuyển</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"> — </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price">{{ number_format(Cart::cartTotal()) }}₫</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <h1 class="logo-text">ASICS</h1>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/cart">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">Thông tin giao hàng</li>
                        <li class="breadcrumb-item ">Phương thức thanh toán</li>
                    </ul>
                </div>
                <div class="main-content">
                    <div class="step">
                        <div class="step-sections">
                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                @php
                                $customer_email = session()->get('customer_email');
                                $customer_name = session()->get('customer_name');
                                @endphp
                                <div class="section-content section-customer-information no-mb">
                                    <div class="logged-in-customer-information">&nbsp;
                                        <div class="logged-in-customer-information-avatar-wrapper">
                                            <div class="logged-in-customer-information-avatar gravatar" style="background-image: url(//www.gravatar.com/avatar/ddb0d6dabc5f462923ae056b38c97683.jpg?s=100&amp;d=blank);filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/ddb0d6dabc5f462923ae056b38c97683.jpg?s=100&amp;d=blank', sizingMethod='scale')"></div>
                                        </div>
                                        <p class="logged-in-customer-information-paragraph">
                                            {{ $customer_name }} ({{ $customer_email }})
                                            <br>
                                            <a href="{{ url('customers/logout') }}">Đăng xuất</a>
                                        </p>
                                    </div>
                                    <div class="fieldset">
                                        <!-- <div class="field field-show-floating-label">
                                            <div class="field-input-wrapper field-input-wrapper-select">
                                                <label class="field-label" for="stored_addresses">Thêm địa chỉ mới...</label>
                                                <select class="field-input" id="stored_addresses">
                                                    <option value="0">Địa chỉ đã lưu trữ</option>
                                                    <option value="1145520395" selected="">70000, Vietnam</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="field">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_full_name">Họ và tên</label>
                                                <input placeholder="Họ và tên" class="field-input" size="30" type="text" id="billing_address_full_name" name="billing_address[full_name]" value="{{ isset($customer_email)?$customer_name:'' }}">
                                            </div>
                                        </div>
                                        <div class="field field-required">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_phone">Số điện thoại</label>
                                                <input placeholder="Số điện thoại" class="field-input" size="30" maxlength="15" type="tel" id="billing_address_phone" name="billing_address[phone]" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="fieldset">
                                        <form id="form_update_shipping_method" class="field default" method="post">
                                            <div class="content-box mt0">
                                                <div id="form_update_location_customer_shipping" class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary">
                                                    <div class="order-checkout__loading--box">
                                                        <div class="order-checkout__loading--circle"></div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_address1">Địa chỉ</label>
                                                            <input placeholder="Địa chỉ" class="field-input" size="30" type="text" id="billing_address_address1" name="billing_address[address1]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="field field-show-floating-label field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province"> Tỉnh / thành  </label>
                                                            <select class="field-input" id="province" onchange="loadDistricts()" name="customer_shipping_province">
                                                                <option value="null" selected="">Chọn tỉnh / thành </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="field field-show-floating-label  field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_district">Quận / huyện</label>
                                                            <select class="field-input" id="district" name="customer_shipping_district">
                                                                <option value="null" selected="">Chọn quận / huyện</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-footer" id="step-footer-checkout">
                            <div class="step-footer-continue-btn btn">
                                <button onclick="window.location.href='{!! url('cart/checkout') !!}'" class="btn-content">Hoàn tất đơn hàng</button>
                            </div>
                            <a class="step-footer-previous-link" href="{{ url('cart') }}">Giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="main-footer footer-powered-by">Powered by Haravan</div>
            </div>
        </div>
    </div>
    <script src="{{  asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')  }}"></script>
    <script src="{{  asset('frontend/jquery/app.js')  }}"></script>
</body>
</html>
