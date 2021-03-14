@extends('templates.master')
@section('title')
	Create Account Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Account</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	<form class="login100-form validate-form"  action="{{ route('cregister') }}" method = "POST">
		{{ csrf_field() }}
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Fullname is required">
			<input class="input100" type="text" name="fullname" placeholder="Full Name">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="text" name="username" placeholder="Username">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		
		<div class="wrap-input100 m-b-10" data-validate = "">
			<select class="input100" name="roles" id="" >
				@foreach($roles  as $role)
					<option value="{{ $role->name}}"> {{ $role->name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
			<input class="input100" type="password" name="password" placeholder="Password">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="password" name="pass" placeholder="Password Confirmation">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="container-login100-form-btn p-t-10">
			<button class="login101-form-btn">
			Create
			</button>
			<button class="login101-form-btn" style='margin-left:6%'>
			Cancel
			</button>
		</div>
	</form>
</div>
@endsection