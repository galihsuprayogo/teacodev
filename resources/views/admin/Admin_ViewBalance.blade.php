@extends('templates.master')
@section('title')
	View Balance Page
@endsection
@section('content')

<div class="mu-title">
	<span class="mu-subtitle">Balance's History</span>
</div>
<div class="table-users">
	<table cellspacing="0">
		<tr >
			<th>Balance Date</th>
			<th>Balance Time</th>
			<th>Balance</th>
			<th>Money In</th>
			<th>Money Out</th>
		</tr>
		@foreach($balances as $balance)
		<tr>
			<td>{{$balance->balance_date}}</td>
			<td>{{$balance->balance_time}}</td>
			<td>{{$balance->balance}}</td>
			<td> @if($balance->money_in == null)
					0
				 @else
				 	{{ $balance->money_in }}
			 	 @endif
			</td>		
			<td> @if($balance->money_out == null)
					0
				 @else
				 	{{ $balance->money_out }}
			 	 @endif
			</td>
		</tr>
		@endforeach
	</table>
	{!! $balances->render() !!}
</div>

@endsection
