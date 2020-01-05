<div class="row justify-content-center">
	@if($errors->any())
		<div class="col-md-11 alert alert-danger">{{ $errors->first() }}</div>
	@endif
	@if(session('success'))
		<div class="col-md-11 alert alert-success">{{ session()->get('success') }}</div>
	@endif
</div>	