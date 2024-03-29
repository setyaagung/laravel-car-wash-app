
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | TJ88</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('template/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('template/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/assets/img/2.jpg')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('template/assets/img/3.jpg')}}" alt="TJ88 Logo" width="70%"></div>
								<p class="lead">Login</p>
							</div>
							<form class="form-auth-small" action="/postlogin" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<script src="{{asset('template/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		@if (Session::has('failed'))
			toastr.error("{{Session::get('failed')}}", "Gagal");
		@endif

		@if (Session::has('sukses'))
			toastr.success("{{Session::get('sukses')}}", "Sukses");
		@endif
	</script>
</body>

</html>
