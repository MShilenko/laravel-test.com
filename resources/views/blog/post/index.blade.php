@extends('layouts.app')

@section('content')
<table class="table">
	@php /** @var array $posts |App|Models|BlogPost */ @endphp
	@foreach($posts as $post)
		<tr>
			<td>{{ $post->id }}</td>
			<td>{{ $post->title }}</td>
			<td>{{ $post->created_at }}</td>
		</tr>
	@endforeach	
</table>
@endsection