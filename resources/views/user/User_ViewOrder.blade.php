@extends('templates.master')
@section('title')
  View Order Page
@endsection
@section('content')
<div class="panel-group" id="accordion">
  @foreach($orders as $order)
  <div class="container" id="panel3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{$order->order_id}}">
          {{ $order->order_id }}
          {!! ' | ' !!}
          {{ $order->order_date}}
          {!! ' | ' !!}
          {{ $order->order_time}}
          {!! ' | ' !!}
          {{ $order->customer_name}}
          {!! ' | ' !!}
          {{ $order->order_status}}
        </a>
        </h4>
      </div>
      
      <div id="{{$order->order_id}}" class="panel-collapse collapse">
        <div class="panel-body">
            @foreach($menus as $menu)
              @if($order->order_id == $menu->order_id)
              <td> {{ $menu->menu_id }} </td>
              <td> {{ $menu->menu_name }} </td>
              <br>
              @endif
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection