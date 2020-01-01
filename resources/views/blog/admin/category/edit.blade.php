@extends('layouts.app')

@section('content')
	@php /** @var array $categoryForEdit |App|Models|BlogCategory */ @endphp
	<form method="POST" action="{{ route('blog.admin.categories.update', $categoryForEdit->id) }}">
		@method('PATCH')
		@csrf
		<div class="container">
			@php /** @var $errors |Illuminate|Support|ViewErrorBag */ @endphp
			<div class="row justify-content-center">
				@if($errors->any())
					<div class="col-md-11 alert alert-danger">{{ $errors->first() }}</div>
				@endif
				@if(session('success'))
					<div class="col-md-11 alert alert-success">{{ session()->get('success') }}</div>
				@endif
			</div>	
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('blog.admin.category.includes.item_edit_main_col')
				</div>
				<div class="col-md-3">
					@include('blog.admin.category.includes.item_edit_add_col')
				</div>
			</div>	
		</div>	
	</form>	
@endsection