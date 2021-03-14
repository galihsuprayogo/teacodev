@extends('templates.master')
@section('title')
	View Type Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Types</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Type Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($types as $type)
		<tr>
			<td>{{$type->type_name}}</td>
			<td>
				<form action="{{ route('etype', $type->id) }}" method="POST">
					<button class="login102-form-btn">
					Edit
					</button>
					{{ csrf_field() }}
				</form>
			</td>
			<td>
				<form action="{{ route('dtype', $type->id) }}" method="POST">
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
	{!! $types->render() !!}
</div>
@endsection