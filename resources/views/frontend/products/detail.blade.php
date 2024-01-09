@extends("frontend.layout_trang_trong")
@section("append-du-lieu")
<!-- breadcrumb shop -->
<div class="breadcrumb-shop clearfix">
    <div class="container-fluid">
        <div>
            <ol class="breadcrumb breadcrumb-arrows">
                <li><a href="{{ url('') }}"><span>Trang chủ</span></a></li>
                <li><span><a href="{{ url('products/category/all') }}">Sản phẩm</a></span></li>
                <li><span><a href="{{ url('products/category/'.$category_id) }}">{{ $category_name }}</a></span></li>
                <li><span>{{ $record->name }}</span></li>
            </ol>
        </div>
    </div>
</div>
<!-- product detail page -->
<div id="product" class="productDetail-page">
    <div class="container-fluid">
        <div class="row product-detail-wrapper">
            <div class="col-md-12">
                <div class="row product-detail-main pr-style">
                    <div class="col-md-6 ml-1" style="right: 20px">
                        <div class="product-gallery">
                            <img src="{{ asset('upload/products/'.$record->photo) }}" width="580px">
                        </div>
                    </div>
                    <div class="col-md-6" style="left: 30px">
                        <div class="product-title">
                            <h1>{{ $record->name }}</h1>
                        </div>
                        <div class="product-price" id="price-preview">
                            <span class="pro-sale">-{{ $record->discount }}%</span>
                            <span class="pro-price">{{ number_format($record->price - ($record->price * $record->discount)/100) }}₫</span>
                            <del>{{ number_format($record->price) }}₫</del>
                        </div>
                        <form id="add-item-form" action="" method="post" class="variants clearfix">
                            <div class="select-swatch clearfix">
                                <div id="variant-swatch-0" class="swatch clearfix" data-option="option1" data-option-index="0">
                                    <div class="header-swatch">Size:	</div>
                                    <div class="select-swap clearfix">  
                                        <div class="n-sd swatch-element">
                                            <input class="variant-0" id="s" type="radio" name="option1" value="Gold" checked="">
                                            <label for="gold" class="sd">
                                                <span>S</span>
                                            </label>
                                        </div>
                                        <div class="n-sd swatch-element">
                                            <input class="variant-0" id="m" type="radio" name="option1" value="Black">
                                            <label for="Black">
                                                <span>M</span>
                                            </label>
                                        </div>
                                        <div class="n-sd swatch-element">
                                            <input class="variant-0" id="l" type="radio" name="option1" value="Black">
                                            <label for="Black">
                                                <span>L</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="selector-actions">
                                <div class="quantity-area">
                                    <input type="button" value="-" onclick="minusQuantity()" class="qty-btn btn-left-quantity">
                                    <input type="text" id="quantity" aria-label="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                                    <input type="button" value="+" onclick="plusQuantity()" class="qty-btn btn-right-quantity">
                                </div>
                                <div class="wrap-addcart">
                                    <button onclick="window.location.href = '{{ url('cart/buy/'.$record->id) }}?quantity='+document.getElementById('quantity').value;" type="button" id="add-to-cart" class="add-to-cartProduct button drakpay btn-addtocart" name="add">Thêm vào giỏ</button>
                                </div>	
                            </div>
                        </form>
                        <div class="product-description">
                            <section class="proDetailInfo">
                                <ul class="nav velaProductNavTabs nav-tabs">
                                    <li class="active"><a href="#proTabs1">MÔ TẢ</a></li>
                                    <li><a href="#proTabs2">ĐIỀU KHOẢN DỊCH VỤ</a></li>
                                    <li><a href="#proTabs3">CHÍNH SÁCH ĐỔI TRẢ</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="proTabs1">
                                        <div class="description-productdetail">
                                            {!! $record->description !!}
                                            <br>
                                            {!! $record->content !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="proTabs2">
                                        <p><span class="wysiwyg-font-size-medium"><strong>1. Giới thiệu</strong></span></p>
                                        <p><span class="wysiwyg-font-size-medium">Chào mừng quý khách hàng đến với website chúng tôi.</span></p>
                                        <p><span class="wysiwyg-font-size-medium">Khi quý khách hàng truy cập vào trang website của chúng tôi có nghĩa là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Điều khoản mua bán hàng hóa này, vào bất cứ lúc nào. Các thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần thông báo trước. Và khi quý khách tiếp tục sử dụng trang web, sau khi các thay đổi về Điều khoản này được đăng tải, có nghĩa là quý khách chấp nhận với những thay đổi đó.</span></p>
                                        <p><span class="wysiwyg-font-size-medium">Quý khách hàng vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của chúng tôi.</span></p>
                                        <p><span class="wysiwyg-font-size-medium"><strong>2. Hướng dẫn sử dụng website</strong></span></p>
                                        <p><span class="wysiwyg-font-size-medium">Khi vào web của chúng tôi, khách hàng phải đảm bảo đủ 18 tuổi, hoặc truy cập dưới sự giám sát của cha mẹ hay người giám hộ hợp pháp. Khách hàng đảm bảo có đầy đủ hành vi dân sự để thực hiện các giao dịch mua bán hàng hóa theo quy định hiện hành của pháp luật Việt Nam.</span></p>
                                        <p>
                                            <span class="wysiwyg-font-size-medium">Trong suốt quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ website. Nếu không muốn tiếp tục nhận mail, quý khách có thể từ chối bằng cách nhấp vào đường link ở dưới cùng trong mọi email quảng cáo.</span>
                                            <span class="wysiwyg-font-size-medium"><strong></strong></span>
                                            <span class="wysiwyg-font-size-medium"></span><span class="wysiwyg-font-size-medium"><strong></strong></span>
                                            <span class="wysiwyg-font-size-medium"></span><span class="wysiwyg-font-size-medium"><strong></strong></span>
                                            <span class="wysiwyg-font-size-medium"></span>
                                        </p>
                                        <p><span class="wysiwyg-font-size-medium"></span><span class="wysiwyg-font-size-medium"></span><br>
                                        </p>
                                        <p><span class="wysiwyg-font-size-medium"><strong>3. Thanh toán an toàn và tiện lợi</strong></span></p>
                                        <p><span class="wysiwyg-font-size-medium">Người mua có thể tham khảo các phương thức thanh toán sau đây và lựa chọn áp dụng phương thức phù hợp:</span></p>
                                        <p>
                                            <span class="wysiwyg-font-size-medium"><strong><u>Cách 1</u></strong>: Thanh toán trực tiếp (người mua nhận hàng tại địa chỉ người bán)<br></span>
                                            <span class="wysiwyg-font-size-medium"><strong><u>Cách 2</u></strong><strong>:</strong>&nbsp;Thanh toán sau (COD – giao hàng và thu tiền tận nơi)<br></span>
                                            <span class="wysiwyg-font-size-medium"><strong><u>Cách 3</u></strong><strong>:</strong>&nbsp;Thanh toán online qua thẻ tín dụng, chuyển khoản</span>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="proTabs3">
                                        <p><strong>1. Điều kiện đổi trả</strong></p>
                                        <p>Quý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng&nbsp;ngay tại thời điểm giao/nhận hàng&nbsp;trong những trường hợp sau:</p>
                                        <ul>
                                            <li>Hàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt hàng.</li>
                                            <li>Không đủ số lượng, không đủ bộ như trong đơn hàng.</li>
                                            <li>Tình trạng bên ngoài bị ảnh hưởng như rách bao bì, bong tróc, bể vỡ…</li>
                                        </ul>
                                        <p>&nbsp;Khách hàng có trách nhiệm trình giấy tờ liên quan chứng minh sự thiếu sót trên để hoàn thành việc&nbsp;hoàn trả/đổi trả hàng hóa.&nbsp;</p>
                                        <p><br></p>
                                        <p><strong>2. Quy định về thời gian thông báo và gửi sản phẩm đổi trả</strong></p>
                                        <ul>
                                            <li><strong>Thời gian thông báo đổi trả</strong>:&nbsp;trong vòng 48h kể từ khi nhận sản phẩm đối với trường hợp sản phẩm thiếu phụ kiện, quà tặng hoặc bể vỡ.</li>
                                            <li><strong>Thời gian gửi chuyển trả sản phẩm</strong>: trong vòng 14 ngày kể từ khi nhận sản phẩm.</li>
                                            <li><strong>Địa điểm đổi trả sản phẩm</strong>: Khách hàng có thể mang hàng trực tiếp đến văn phòng/ cửa hàng của chúng tôi hoặc chuyển qua đường bưu điện.</li>
                                        </ul>
                                        <p>Trong trường hợp Quý Khách hàng có ý kiến đóng góp/khiếu nại liên quan đến chất lượng sản phẩm, Quý Khách hàng vui lòng liên hệ đường dây chăm sóc khách hàng&nbsp;của chúng tôi.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
