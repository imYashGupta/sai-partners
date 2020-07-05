@if(session()->has('success'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<strong>Success! </strong> {{session()->get('success')}}
</div>
@elseif(session()->has('warning'))
<div class="alert alert-warning" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<strong>Oops! </strong> {{session()->get('warning')}}
</div>
@elseif(session()->has("error"))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<strong>Oh Snap! Error: </strong> {{session()->get('error')}}
</div>
@endif