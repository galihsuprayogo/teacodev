@extends('templates.master')
@section('title')
	View Board Page
@endsection
@section('content')

<div class="mu-title">
	<span class="mu-subtitle">Boards</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Board No</th>
			<th>Board Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($boards as $board)
		<tr>
			<td>{{$board->board_id}}</td>
			<td> @if($board->board_status == null)
					not booked
				 @else
				 	booked
			 	 @endif
			</td>
			<td>
				<form action="{{ route('uboard', $board->board_id) }}" method="POST">
					<button class="login102-form-btn" >
					Refresh
					</button>
					{{ csrf_field() }}
					{{ method_field('PATCH')}}
				</form>
			</td>
			<td>			
				<form action="{{ route('dboard', $board->board_id) }}" method="POST">	@if($board->board_id == $bmax)
						<button class="login102-form-btn" name="dpack">
						Delete
						</button>
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
					@endif
								
				</form>
			</td>
				
		</tr>
		@endforeach
	</table>
		{!! $boards->render() !!}
</div>

@endsection
