@extends('templates.master')
@section('title')
	Edit Account Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Edit Users Acccount</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	@foreach($result as $user)
	<form class="login100-form validate-form"  action="{{ route('uaccount', $user->id) }}" method = "POST">
		{{ csrf_field() }}
		{{ method_field('PATCH')}}
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="text" name="username" value="{{$user->username}}" placeholder="Username" disabled="">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Fullname is required">
			<input class="input100" type="text" name="fullname" value="{{$user->fullname}}" placeholder="Full Name">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 m-b-10" data-validate = "">
			<select class="input100" name="roles" id="" >
				@foreach($roles  as $role)
				<option value="{{ $role->id}}"
					@if($user->name == $role->name)
					selected=""
				@endif> {{ $role->name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="container-login100-form-btn p-t-10">
			<button class="login101-form-btn">
			Update
			</button>

			<button class="login101-form-btn" style='margin-left:6%'>
			Cancel
			</button>
		</div>
	</form>
	@endforeach
</div>
@endsection