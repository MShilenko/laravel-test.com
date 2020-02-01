@extends('layouts.app')

@section('content')
	@php /** @var array $post |App|Models|Postposts */ @endphp
	@if($post->exists)
		{!! Form::open([
				'route' => ['blog.admin.posts.update', $post->id],
				'method' => 'patch'
			]) 
		!!}
	@else
		{!! Form::open(['route' => 'blog.admin.posts.store']) !!}
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
		{!! Form::close() !!}	
		@if($post->exists)
			{!! Form::open([
					'route' => ['blog.admin.posts.destroy', $post->id],
					'method' => 'delete'
				]) 
			!!}
				{{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
			{!! Form::close() !!}
		@endif
@endsection