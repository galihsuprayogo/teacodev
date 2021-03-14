@extends('templates.master')
@section('title')
	Create Packet Menu Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Packet Menus</span>
</div>
<div class=" p-t-12">
	<form class="login100-form validate-form"  action="{{ route('cpacketmenu') }}" method = "POST">
		{{ csrf_field() }}
		
		<div class="wrap-input101 m-b-1" data-validate = "">
			<select class="input101" name="packetid" id="" >
				@foreach($packets  as $packet)
				<option value="{{ $packet->id}}"> {{ $packet->packet_name}} </option>
				@endforeach
			</select>
			<span class="focus-input100"></span>
			<span class="symbol-input101">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<div class="table-users col-md-offset-2">
			<table cellspacing="0">
				<tr >
					<th>Choose</th>
					<th>Menu Id</th>
					<th>Menu Name</th>
					<th>Menu Stock</th>
					<th>Menu Price</th>
				</tr>
				
				@foreach($menus as $menu)
				<tr>
					<td><input type="checkbox" name="menuid[]" value="{{$menu->menu_id}}"></td>
					<td>{{$menu->menu_id}}</td>
					<td>{{$menu->menu_name}}</td>
					<td>{{$menu->menu_stock}}</td>
					<td>{{$menu->menu_price}}</td>
					
				</tr>
				@endforeach
			</table>
		</div>
		<div class="container-login100-form-btn p-t-10">
			<button class="login104-form-btn">
			Create
			</button>
		</div>
	</form>
	
	
</div>
@endsection