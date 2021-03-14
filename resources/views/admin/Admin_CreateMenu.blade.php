@extends('templates.master')
@section('title')
	Create Menu Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Menus</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	<form class="login100-form validate-form"  action="{{ route('cmenu') }}" method = "POST">
		{{ csrf_field() }}
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Fullname is required">
			<input class="input100" type="text" name="menuid" value="{{ $menu_id}}" placeholder="Menu Id" readonly="">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="text" name="menuname" placeholder="Menu Name">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="number" min=1 name="menustock" placeholder="Menu Stock">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		
		<div class="wrap-input100 m-b-10" data-validate = "">
			<select class="input100" name="menuunit" id="" >
				@foreach($units  as $unit)
				<option value="{{ $unit->id}}"> {{ $unit->unit_name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 m-b-10" data-validate = "">
			<select class="input100" name="menutype" id="" >
				@foreach($types  as $type)
				<option value="{{ $type->id}}"> {{ $type->type_name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=100 name="menuprice" placeholder="Menu Price">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=1 name="menudiscount" placeholder="Menu Discount (%)">
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