@if(session('success'))
<div class="container" id="alerts">
	<div class="alert alert-success">
		{{session('success')}}
	</div>
</div>
@elseif(session('danger'))
<div class="container" id="alertd">
	<div class="alert alert-danger">
		{{session('danger')}}
	</div>
</div>
@endif