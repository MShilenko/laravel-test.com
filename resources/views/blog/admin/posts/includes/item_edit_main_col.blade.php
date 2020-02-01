@php 
/** 
 * @var array $post |App|Models|BlogPost 
 * @var array $categoriesList |App|Models|BlogCategory
 */ 
@endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">	
					<div class="form-check">
						{{ Form::hidden('is_published', 0) }}
						{{ Form::checkbox('is_published', 1, $post->is_published, ['class' => 'form-check-input']) }}
						{{ Form::label('is_published', 'Опубликовано', ['class' => 'form-check-label']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Заголовок') }}
						{{ Form::text('title', $post->title, ['class' => 'form-control']) }}
					</div>	
					<div class="form-group">
						{{ Form::label('slug', 'ЧПУ') }}
						{{ Form::text('slug', $post->slug, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('category_id', 'Родитель') }}
						{{ Form::select('category_id', $categoriesList, $post->category_id, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('excerpt', 'Превью') }}
						{{ Form::textarea('excerpt', $post->excerpt, ['class' => 'form-control', 'rows' => 2]) }}
					</div>
					<div class="form-group">
						{{ Form::label('content_raw', 'Описание') }}
						{{ Form::textarea('content_raw', $post->content_raw, ['class' => 'form-control', 'rows' => 3]) }}
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	