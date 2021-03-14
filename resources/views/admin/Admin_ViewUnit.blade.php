@extends('templates.master')
@section('title')
	View Unit Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Units</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Unit Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($units as $unit)
		<tr>
			<td>{{$unit->unit_name}}</td>
			<td>
				<form action="{{ route('eunit', $unit->id) }}" method="POST">
					<button class="login102-form-btn">
					Edit
					</button>
					{{ csrf_field() }}
				</form>
			</td>
			<td>
				<form action="{{ route('dunit', $unit->id) }}" method="POST">
					<button class="login102-form-btn" >
					Delete
					</button>
					{{ csrf_field() }}
					{{ method_field('DELETE')}}
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $units->render() !!}
</div>
@endsection