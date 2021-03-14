@extends('templates.master')
@section('title')
	View Packet Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Packet Menus</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Packet Name</th>
			<th>Menu Id</th>
			<th>Menu Name</th>
			<th>Menu Stock</th>
			<th>Menu Price</th>
			<th>Edit</th>
			<th>Delete Packet</th>
			<th>Delete Menu</th>
		</tr>
		@foreach($packetmenus as $packet)
	
		<tr>
			<td>{{$packet->packet_name}}</td>
			<td>{{$packet->menu_id}}</td>
			<td>{{$packet->menu_name}}</td>
			<td>{{$packet->menu_stock}}</td>
			<td>{{$packet->menu_price}}</td>
			<td>
				<form action="{{ route('epacketm', $packet->id) }}" method="POST">
					@can('edit packet menu')
						<button class="login103-form-btn">
						Add Menu
						</button>
						{{ csrf_field() }}
					@endcan
				</form>
			</td>
			<td>
				<form action="{{ route('dpacketm', [$packet->menu_id, $packet->id]) }}" method="POST">
					@can('delete menu packet')
						<button class="login103-form-btn" >
						Delete Menu
						</button>
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
					@endcan
				</form>
			</td>
			<td>
				<form action="{{ route('dpacket', $packet->id) }}" method="POST">
					@can('delete packet menu')
						<button class="login103-form-btn" >
						Delete Packet
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