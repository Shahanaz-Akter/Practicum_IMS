<!doctype html>
<html lang="en">

<head>
	<title>Login Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('/login_assets/css/style.css')}}">

</head>
<style>
	body {
		height: 100vh;
		background-image: url('/images/bg10.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<marquee behavior="" direction=""><h2 class="heading-section"><b style="color: green; font-size:50px;">Restaurant Inventory Management System</b></h2></marquee>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4" style="color: green;">Login To Continue</h3>
						<form action="{{url('/post_login')}}" class="login-form" method="post">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control rounded-left" placeholder="Email" name="email" required>
							</div>
							<div class="form-group d-flex">
								<i class="lni lni-key" style="position:absolute; left: 60px;"></i>
								<input style="position:relative;" type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary" style="color: green;">Remember Me
										<input type="checkbox" name="remember_me">
										<span class="checkmark"></span>
									</label>
									<!-- <p>dont stress do your best forget the rest</p> -->
								</div>
								<div class="w-50 text-md-right">
									<!-- <a href="#">Forgot Password</a> -->
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('/login_assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('/login_assets/js/popper.js')}}"></script>
	<script src="{{asset('/login_assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/login_assets/js/main.js')}}"></script>

</body>

</html>