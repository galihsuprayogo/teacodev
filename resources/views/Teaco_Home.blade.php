@extends('templates.master')
@section('title')
	Home Page
@endsection
@section('content')
<section id="mu-counter">
	<div class="mu-counter-overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-counter-area">
						<ul class="mu-counter-nav">
							@foreach ($menus as $menu)
							<li class="col-md-3 col-sm-3 col-xs-12">
								<div class="mu-single-counter">
									<span>Stock</span>
									<h3><span class="counter-value" data-count="{{$menu->stock}}">0</span><sup>+</sup></h3>
									<p>{{$menu->type_name}}</p>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection