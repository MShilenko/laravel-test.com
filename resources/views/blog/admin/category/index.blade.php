@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				<a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
			</nav>
			<div class="card">
				<div class="card-body">
					<table class="table table-hover">
						<tr>
							<th>#</th>
							<th>Категория</th>
							<th>Родитель</th>
						</tr>
						@php /** @var array $categories |App|Models|BlogCategory */ @endphp
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td><a href="{{ route('blog.admin.categories.edit', $category->id) }}">{{ $category->title }}</td>
								<td>{{ $category->parentTitle }}</td>
							</tr>
						@endforeach	
					</table>	
					@if($categories->total() > $categories->count())		
						{{ $categories->links() }}
					@endif	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection