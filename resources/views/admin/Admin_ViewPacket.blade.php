@extends('templates.master')
@section('title')
	View Packet Page
@endsection
@section('content')

<div class="mu-title">
	<span class="mu-subtitle">Packets</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Packet Name</th>
			<th>Packet Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($packets as $packet)
		<tr>
			<td>{{$packet->packet_name}}</td>
			<td> @if($packet->packet_status == null)
					not used
				 @else
				 	used
			 	 @endif
			</td>
			<td>
				{{-- <form action="#" method="POST"> --}}
					<button class="login102-form-btn" id="rpack" >
					Refresh
					</button>
					{{-- {{ csrf_field() }} --}}
					{{-- {{ method_field('PATCH')}} --}}
				</form>
			</td>
			<td>
				
				<form action="{{ route('dpackett', $packet->id) }}" method="POST">
					@if($packet->packet_status == null)
					
						<button class="login102-form-btn" name="dpack">
						Delete
						</button>
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
					@else
					<button class="login102-form-btn" disabled="" id="dis">
						Delete
					</button>						 	
				 	@endif
					
				</form>
				
			</td>
			
				
		</tr>
		@endforeach
	</table>
		{!! $packets->render() !!}
</div>

	
@endsection
