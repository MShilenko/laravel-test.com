<div class="row justify-content-center">
	@if($errors->any())
		<div class="col-md-11 alert alert-danger">
			<ul>
				@foreach($errors->all() as $errorTxt)
					<li>{{ $errorTxt }}</li>
				@endforeach
			</ul>
			</div>
	@endif
	@if(session('success'))
		<div class="col-md-11 alert alert-success">{{ session()->get('success') }}</div>
	@endif
</div>	