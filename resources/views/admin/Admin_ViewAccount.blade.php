@extends('templates.master')
@section('title')
	View Account Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Users Acccount</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Fullname</th>
			<th>Username</th>
			<th>Role</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($result as $user)
		<tr>
			<td>{{$user->fullname}}</td>
			<td>{{$user->username}}</td>
			<td>{{$user->name}}</td>
			<td>
				<form action="{{ route('eaccount', $user->id) }}" method="POST">
					<button class="login102-form-btn">
					Edit
					</button>
					{{ csrf_field() }}
				</form>
			</td>
			<td>
				<form action="{{ route('daccount', $user->id) }}" method="POST">
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
</div>
@endsection