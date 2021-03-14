@extends('templates.master')
@section('title')
	Edit Packet Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Edit Packet Menus</span>
</div>
<div class="p-t-12">
<form class="login100-form validate-form"  action="{{ route('upacketm', $packet_id) }}" method = "POST">
	{{ csrf_field() }}
	{{ method_field('PATCH')}}
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
					<td>
						<input type="checkbox" name="menuid[]" value="{{$menu->menu_id}}"
						@foreach($packets as $packet)					
						@if($menu->menu_id == $packet->menu_id)checked=""
						@else
						@endif
						@endforeach>
					</td>
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