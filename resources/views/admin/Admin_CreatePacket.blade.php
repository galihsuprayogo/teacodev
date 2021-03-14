@extends('templates.master')
@section('title')
	Create Packet Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Packets</span>
</div>
<div class="wrap-login100 p-t-12 col-md-offset-4">
	<form class="login100-form validate-form"  action="{{ route('cpacket') }}" method= "POST">
		{{ csrf_field() }}
		<div class="wrap-input100 validate-input m-b-10" data-validate = "Fullname is required">
			<input class="input100" type="text" name="packetname" placeholder="packet name" value="" >
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user"></i>
			</span>
		</div>
		<div class="container-login100-form-btn p-t-10">
			<button class="login107-form-btn">
			Create
			</button>
		</div>
	</form>
</div>
@endsection