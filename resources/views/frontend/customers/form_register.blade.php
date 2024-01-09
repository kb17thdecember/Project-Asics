@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<main class="mainContainer_theme">
    <div class="layout-account">
	    <div class="container">
		    <div class="wrapbox_login_account">
			    <div class="wrapbox-heading-account">
                    <div class="header-page clearfix">
                        <h1>Tạo tài khoản</h1>
                    </div>
                </div>
                @if(session('notify'))
                <div class="alert alert-danger">
                    {{ session('notify') }}
                </div>
                @endif
                <div class="wrapbox-content-account">
                    <div class="userbox">
                        <form action="{{ url('customers/register-post') }}" id="create_customer" method="post">
                            @csrf
                            <div id="name-div" class="clearfix large_form">
                                <label for="name" class="label icon-field"></label>
                                <input required="" type="text" value="" name="name" placeholder="Họ tên" id="name" class="text" size="30">
                            </div>
                            <div id="email-div" class="clearfix large_form">
                                <label for="email" class="label icon-field"></label>
                                <input required="" type="email" value="" name="email" placeholder="Email" id="email" class="text" size="30">
                            </div>
                            <div id="address-div" class="clearfix large_form">
                                <label for="address" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
                                <input type="text" value="" placeholder="Địa chỉ" name="address" id="address" class="text" size="30">
                            </div>
                            <div id="phone-div" class="clearfix large_form">
                                <label for="phone" class="label icon-field"></label>
                                <input required="" type="text" value="" placeholder="Số điện thoại" name="phone" id="phone" class="text" size="30">
                            </div>
                            <div id="password-div" class="clearfix large_form">
                                <label for="password" class="label icon-field"></label>
                                <input required="" type="password" value="" placeholder="Mật khẩu" name="password" id="password" class="password text" size="30">
                            </div>
                            <div class="clearfix action_account_custommer">
                                <div class="action_bottom button dark">
                                    <input class="btn" type="submit" value="Đăng ký">			
                                </div>						
                            </div>
                            <div class="clearfix req_pass">
                                <a class="come-back" href="{{ url('') }}"><i class="fa fa-long-arrow-left"></i> Quay lại trang chủ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
