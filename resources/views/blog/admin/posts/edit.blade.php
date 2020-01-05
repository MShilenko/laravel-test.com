@extends('layouts.app')

@section('content')
	@php /** @var array $post |App|Models|Postposts */ @endphp
	@if($post->exists)
		<form method="POST" action="{{ route('blog.admin.posts.update', $post->id) }}">
		@method('PATCH')
	@else
		<form method="POST" action="{{ route('blog.admin.posts.store') }}">
	@endif
			@csrf
			<div class="container">
				@php /** @var $errors |Illuminate|Support|ViewErrorBag */ @endphp
				@include('blog.admin.posts.includes.result_messages')
				<div class="row justify-content-center">
					<div class="col-md-8">
						@include('blog.admin.posts.includes.item_edit_main_col')
					</div>
					<div class="col-md-3">
						@include('blog.admin.posts.includes.item_edit_add_col')
					</div>
				</div>	
			</div>	
		</form>	
		@if($post->exists)
			<form class="row justify-content-center" method="POST" action="{{ route('blog.admin.posts.update', $post->id) }}">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger">Удалить</button>
			</form>
		@endif
@endsection