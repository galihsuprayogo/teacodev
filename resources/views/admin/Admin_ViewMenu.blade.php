@extends('templates.master')
@section('title')
	View Menu Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Menus</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Menu Id</th>
			<th>Menu Name</th>
			<th>Menu Stock</th>
			<th>Menu Unit</th>
			<th>Menu Type</th>
			<th>Menu Price</th>
			<th>Menu Discount</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($menus as $menu)
		<tr>
			<td>{{$menu->menu_id}}</td>
			<td>{{$menu->menu_name}}</td>
			<td>{{$menu->menu_stock}}</td>
			<td>{{$menu->unit_name}}</td>
			<td>{{$menu->type_name}}</td>
			<td>{{$menu->menu_price}}</td>
			<td>{{$menu->menu_discount}}</td>
			<td>
				<form action="{{ route('emenu', $menu->menu_id) }}" method="POST">
				@can('edit menu')
					<button class="login102-form-btn">
					Edit
					</button>
					{{ csrf_field() }}
				@endcan
				</form>
			</td>
			<td>
				<form action="{{ route('dmenu', $menu->menu_id) }}" method="POST">
				@can('delete menu')
					<button class="login102-form-btn" >
					Delete
					</button>
					{{ csrf_field() }}
					{{ method_field('DELETE')}}
				@endcan
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection