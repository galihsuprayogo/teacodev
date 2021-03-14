<!DOCTYPE html>
<html lang="en">
<title>Login</title>
@include('templates.sublayouts._head')
@include('templates.sublayouts._headlogvendor')
	
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{ asset('assets/img/coffestore.jpg') }});">
			<div class="wrap-login100 p-t-70 p-b-10">
				<form class="login100-form validate-form" action="{{ route('login') }}" method = "POST">
					{{ csrf_field() }}
					<div class="login100-form-avatar" >
						<img src="{{ asset('assets/img/teaco.png')}}" alt="AVATAR">
					</div>

					<span class="login100-form-title p-b-15">
						TeaCo Coffe
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
							
						<input class="input100" type="password" name="password" placeholder="Password" id="pas">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						 {{-- <i class="glyphicon glyphicon-eye-open"></i> --}}
							<i class="fa fa-lock"></i>
						</span>
						
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">	
						<table cellspacing="0" cellpadding="0">
							<tr style="background-color: transparent;">
								<td style="padding-left: 2.5em;"><input class="" type="checkbox" onclick="myFunction()" ></td>
								<td style="padding-right: 24em;">show password</td>
							</tr>
						</table>
						 		
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							{{-- Forgot Username / Password? --}}
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@include('templates.sublayouts._script');
<script type="text/javascript">	
	function myFunction() {
    var x = document.getElementById("pas");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>
</html>