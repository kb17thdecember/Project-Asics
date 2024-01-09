<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{  asset('https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap')  }}" rel="stylesheet">

	<link rel="stylesheet" href="{{  asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')  }}">
	
	<link rel="stylesheet" href="{{  asset('admin/css/css1.css')  }}">

	</head>
	<body class="img js-fullheight" style="background-image: url(img/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">ASICS</h2>
					@if(Request::get("notify") == "invalid" )
						<div class="" style="color: black">Đăng nhập chưa thành công!</div>
					@endif
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form method="post" action="{{ url('admin/login-post') }}" class="signin-form">
		      		@csrf
		      		<div class="form-group">
		      			<input type="email" name="email" class="form-control" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Ghi nhớ đăng nhập
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Quên mật khẩu</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Hoặc đăng nhập với &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{  asset('admin/js/login/jquery.min.js')  }}"></script>
  	<script src="{{  asset('admin/js/login/popper.js')  }}"></script>
  	<script src="{{  asset('admin/js/login/bootstrap.min.js')  }}"></script>
  	<script src="{{  asset('admin/js/login/main.js')  }}"></script>

	</body>
</html>

