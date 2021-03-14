@extends('templates.master')
@section('title')
	Edit Menu Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Edit Menus</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	@foreach($menus as $menu)
	<form class="login100-form validate-form"  action="{{ route('umenu', $menu->menu_id) }}" method = "POST">
		{{ csrf_field() }}
		{{ method_field('PATCH')}}
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Fullname is required">
			<input class="input100" type="text" name="menuid" value="{{$menu->menu_id}}" placeholder="Menu Id" readonly="">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="text" name="menuname" value="{{$menu->menu_name}}" placeholder="Menu Name">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="number" min=1 name="menustock" value="{{$menu->menu_stock}}" placeholder="Menu Stock">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		
		<div class="wrap-input100 m-b-10" data-validate = "">
			<select class="input100" name="menuunit" id="" >
				@foreach($units  as $unit)
				<option value="{{ $unit->id}}"
					@if($menu->unit_name == $unit->unit_name)
					selected=""
				@endif> {{ $unit->unit_name}} </option>
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
				<option value="{{ $type->id}}"
					@if($menu->type_name == $type->type_name)
					selected=""
				@endif> {{ $type->type_name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=100 name="menuprice" value="{{$menu->menu_price}}" placeholder="Menu Price">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=1 name="menudiscount" value="{{$menu->menu_discount}}" placeholder="Menu Discount">
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