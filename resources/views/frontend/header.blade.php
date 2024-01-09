
<!-- header begin -->
<div class="main-header-height">
    <header class="main-header main-header-template-01">
        <div class="main-header-height" style="min-height: 112px;">
            <div class="main-header main-header-template-01" style="background-color: darkblue">
                <div class="top-bar top-bar-template-header-01" style="background-color: darkblue">
                    <div class="container-fluid" >
                        <div class="wraper-top-bar" >
                            <p>Miễn phí vận chuyển với đơn hàng trên 1.500.000 đ</p>
                        </div>
                    </div>
                </div>
                <ul class="" style="display: flex;padding: 0 15px;margin-left: 830px; > 
                    <li>                           
                        <a href="/vn/en-vn"><span style="color: white;">English</span></a>
                    </li>           
                    <li>    
                        <a href="//www.asics.com/vn/vi-vn/contact"><span style="color: white;padding: 0 15px;">Trợ Giúp</span></a>      
                    </li>
                    <li>
                        <a href="//www.asics.com/vn/vi-vn/store-locator"><span style="color: white;padding: 0 15px;">Vị Trí Cửa Hàng</span></a>   
                    </li>
                    <li> 
                        <a href="/vn/vi-vn/account-login"><span style="color: white;padding: 0 15px;">Tài khoản của tôi</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-middle">
            <div class="container-fluid">
                <div class="flexContainer flexAlignCenter rowFlexMargin">
                    <div class="header-menu site-menu-mobile">
                        <div id="site-menu-handle" class="site-menu hamburger-menu">
                            <span class="bar"></span>
                        </div>
                        <div class="menu-mobile">
                            <span class="box-triangle">
                                <svg viewBox="0 0 20 9">
                                    <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                </svg>
                            </span>
                            <div class="site-nav-container">
                                <div class="menu-mobile-content">
                                    <div id="mp-menu" class="mp-menu mp-cover">
                                        <div class="mp-level">
                                            <div class="mplus-menu"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-logo header-mid">
                        <div class="wrap-logo">
                            <h1>
                                <a href="{{ url('') }}">ASICS</a>
                            </h1>
                        </div>
                    </div>
                    <div class="header-menu site-menu-desktop">
                        <div class="nav-main-menu">
                            <nav class="main-nav text-center">
                                <ul class="level0 clearfix">
                                    <li class="nav1 has-sub level0">
                                        <a href="{{ url('') }}">Trang chủ</a>
                            
                                    </li>
                                    <li class="nav1 has-sub level0">
                                        <a href="{{ url('products/category/all') }}">Sản phẩm <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu level1">
                                            @php
                                                $categories = DB::table("categories")->where("parent_id","=","0")->orderBy("id","desc")->get();
                                            @endphp
                                            @foreach($categories as $row)
                                            <li class="nav2">
                                                <a href="{{ url('products/category/'.$row->id) }}">{{ $row->name }}
                                                    <!-- <i class="fa fa-chevron-right"></i> -->
                                                </a>
                                                <ul class="sub-menu level2">
                                                    @php
                                                        $categories_sub = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
                                                    @endphp
                                                    @foreach($categories_sub as $row_sub)
                                                    <li><a href="{{ url('products/category/'.$row_sub->id) }}">{{ $row_sub->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav1"><a href="{{ url('blogs/news') }}">Tin tức</a></li>
                                    <li class="nav1"><a href="{{ url('contact') }}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-wrap-icon">
                        <!-- Search site nav -->
                        <div class="search header--icon">
                            <a href="javascript:;" class="link-box header-site-nav" id="site-nav-search">
                                <span class="icon-box"><i class="fa-solid fa-magnifying-glass fa-xl"></i></span>
                            </a>
                            <div class="wpo-wrapper-search wpo-wrapper-search-dk site--nav">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site-nav-container">
                                    <p class="titlebox">Tìm kiếm</p>
                                    <div class="search-product-nav">
                                        <form class="search-product ultimate-search">
                                            <input required="" onkeyup="search();" value="" id="key" maxlength="40" class="search-product-input" type="text" placeholder="Tìm kiếm sản phẩm...">
                                            <button type="button" class="btn-search-product" onclick="location.href='{{ url('products/search-name') }}?key='+document.getElementById('key').value;">
                                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve"><path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path><rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect></svg>
                                            </button>
                                        </form>
                                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none;">
                                            <div class="Content">
                                                {{-- <div class="item-ult">
                                                    <div class="title">
                                                        <a title="GEL-NIMBUS 29 ANYVERSARY" href="/products/le-my-sieu-ngot">GEL-NIMBUS 29 ANYVERSARY</a>
                                                        <p class="f-initial">4,400,000₫
                                                        </p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/gel-nimbus-29-anyvesary" title="GEL-NIMBUS 29 ANYVERSARY">
                                                            <img alt="GEL-NIMBUS 29 ANYVERSARY" src="http://127.0.0.1:8000/products/detail/9">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="GEL-NIMBUS 29" href="/products/thanh-long-ruot-do">GEL-NIMBUS 29</a>
                                                        <p class="f-initial">7,200,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/gel-nimbus-29" title="GEL-NIMBUS 29">
                                                            <img alt="GEL-NIMBUS 29" src="http://127.0.0.1:8000/products/detail/10">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="GEL-NIMBUS 25" href="/products/mang-cut-thai-lan-1kg">GEL-NIMBUS 25</a>
                                                        <p class="f-initial">4,000,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/gel-nimbus-25" title="GEL-NIMBUS 25">
                                                            <img alt="GEL-NIMBUS 25" src="http://127.0.0.1:8000/products/detail/11">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="GEL-EXCITE 9" href="/products/dua-bo-thom-thai-lan">GEL-EXCITE 9</a>
                                                        <p class="f-initial">6,400,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/gel-excite-9" title="GEL-EXCITE 9">
                                                            <img alt="GEL-EXCITE 9" src="http://127.0.0.1:8000/upload/products/1702041752_shoes9.webp">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="NOVABLAST 3 LE" href="/products/xoai-cat-hoai-loc-1kg">NOVABLAST 3 LE</a>
                                                        <p class="f-initial">5,600,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/novablast-3-le" title="NOVABLAST 3 LE">
                                                            <img alt="NOVABLAST 3 LE" src="http://127.0.0.1:8000/upload/products/1702041728_shoes8.webp">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="resultsMore">
                                                    <a href="/search?type=product&amp;q=l">Xem thêm 5 sản phẩm</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div> 
                                    <script type="text/javascript">
                                        function search() {
                                            var key = document.getElementById("key").value;
                                            if (key != "") {
                                                $("#ajaxSearchResults").attr("style", "display: block");
                                                $.get("{{ url('products/search-ajax') }}?key="+key, function (result) {
                                                    $("#ajaxSearchResults .Content").empty();
                                                    $("#ajaxSearchResults .Content").append(result);
                                                });
                                            } else {
                                                $("#ajaxSearchResults").attr("style", "display: none");
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="account header--icon">
                            <a href="javascript:void(0);" class="link-box header-site-nav" id="site-nav-account">
                                <span class="icon-box"><i class="fa-regular fa-user fa-xl"></i></span>
                            </a>
                            @php
                                $customer_name = session()->get('customer_name');
                                //có thể dùng cách khác: $customer_name = Sesion::get('customer_name');
                            @endphp
                            @if(isset($customer_name))
                            <div class="site--nav site_account site-account--info">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site_account_panel_list">
                                    <div class="site_account_info">
                                        <div class="site_account_header">		
                                            <h2>Thông tin tài khoản</h2>	
                                        </div>
                                        <ul>
                                            <li><span>{{ $customer_name }}</span></li>
                                            <li><a href="">Tài khoản của tôi</a></li>
                                            <li><a href="">Danh sách địa chỉ</a></li>
                                            <li><a href="{{ url('customers/logout') }}">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="site--nav site_account ">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site_account_panel_list">
                                    <div id="header-login-panel" class="site_account_panel site_account_default is-selected">
                                        <div class="site-nav-container">
                                            <form action="{{ url('customers/login-post') }}" id="customer_login" method="post">
                                                @csrf
                                                <div class="site_account_header">
                                                    <h2 class="site_account_title heading">Đăng nhập tài khoản</h2>
                                                    <p class="site_account_legend">Nhập email và mật khẩu của bạn:</p>
                                                </div>
                                                <div class="form__input-wrapper form__input-wrapper--labelled">
                                                    <input type="email" id="login-email" class="form__field form__field--text is-filled" name="email" required="required">
                                                    <label for="login-email" class="form__floating-label">Email</label>
                                                </div>
                                                <div class="form__input-wrapper form__input-wrapper--labelled">
                                                    <input type="password" id="login-password" class="form__field form__field--text is-filled" name="password" required="required">
                                                    <label for="login-password" class="form__floating-label">Mật khẩu</label>
                                                </div>
                                                <div style="background-color: darkblue">
                                                    <button type="submit" class="form__submit button dark" id="form_submit-login">Đăng nhập</button>
                                                </div>
                                            </form>
                                            <div class="site_account_secondary-action">
                                                <p>Khách hàng mới? 
                                                    <a href="{{ url('customers/register') }}" class="link" style="color: darkblue">Tạo tài khoản</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="cart header--icon">
                            <?php
                                use App\ShoppingCart\Cart;
                            ?>
                            <a href="{{ url('cart') }}" class="link-box">
                                <span class="icon-box">
                                    <i class="fa-solid fa-cart-plus fa-xl"></i>
                                    <span class="count-holder"><span class="count">{{ Cart::cartNumber() }}</span></span>
                                    <style>
                                        .count{
                                            padding: 0 6px 0 6px;
                                            background-color: darkblue;
                                            border-radius: 15px;
                                            position: relative;
                                            top: -37px;
                                            right: -14px;
                                            color: white;
                                        }
                                    </style>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- header end -->

<!-- search bar mobile -->
<div class="search-bar-mobile">
    <div class="search-box">
        <form class="searchform">
            <input type="text" class="searchinput" size="20" placeholder="Tìm kiếm sản phẩm...">
            <button type="submit" class="btn-search btn">
                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                    <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path>
                    <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect>
                </svg>
            </button>
        </form>
    </div>
</div>
<!-- search bar mobile end -->

