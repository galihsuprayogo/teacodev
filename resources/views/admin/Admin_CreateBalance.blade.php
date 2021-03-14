@extends('templates.master')
@section('title')
	Create Balance Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Balances</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	<form class="login100-form validate-form"  action="{{ route('cbalance') }}" method = "POST">
		{{ csrf_field() }}
		
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
			<input class="input100" type="text" name="balancedate" value="{{$bdate}}"placeholder="Date -- Time" readonly="">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=0 name="moneyin" placeholder="Money In">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock"></i>
			</span>
		</div>

		<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirmation Password is required">
			<input class="input100" type="number" min=0 name="moneyout" placeholder="Money Out">
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