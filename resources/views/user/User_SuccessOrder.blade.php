@extends('templates.master')
@section('title')
	Success Order Page
@endsection
@section('content')
<div class="container" id="panel2">
	<div class="panel panel-default">
		<div class="panel-heading">
			info cashback
		</div>
		<div class="panel-body">
			<h1>Cashback : </h1>
			<h2> {{ $cashback }} </h2>
		</div>
	</div>
</div>
@endsection