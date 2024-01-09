@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<main class="mainContainer_theme">
    <div class="layout-account">
        <div class="container-fluid">
            <div class="wrapbox_login_account">
                <div class="wrapbox-heading-account">
                    <div class="header-page clearfix">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                @if(session('notify'))
                <div class="alert alert-danger">
                    {{ session('notify') }}
                </div>
                @endif
                <div class="wrapbox-content-account">
                    <div id="customer-login">
                        <div id="login" class="userbox">
                            <div class="accounttype">
                                <h2 class="title"></h2>
                            </div>
                            <form action="{{ url('customers/login-post') }}" id="customer_login" method="post">
                                @csrf
                                <div class="clearfix large_form">
                                    <label for="email" class="icon-field"></label>
                                    <input required="" type="email" value="" name="email" id="email" placeholder="Email" class="text">
                                </div>
                                <div class="clearfix large_form">
                                    <label for="password" class="icon-field"></label>
                                    <input required="" type="password" value="" name="password" id="password" placeholder="Mật khẩu" class="text" size="16">      
                                </div>
                                <div class="clearfix action_account_custommer">
                                    <div class="action_bottom button dark">
                                        <input class="btn btn-signin" type="submit" value="Đăng nhập">
                                    </div>
                                    <div class="req_pass">
                                        Chưa có tài khoản ?
                                        <br>
                                        <a href="{{ url('customers/register') }}" title="Đăng ký">Đăng ký</a>
                                    </div>
                                </div>
                            </form>
                        </div>					
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection