@php 
/** 
 * @var array $category |App|Models|BlogCategory 
 * @var array $categoriesForSelectList |App|Models|BlogCategory 
 */ 
@endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">	
					<div class="form-group">
						{{ Form::label('title', 'Заголовок') }}
						{{ Form::text('title', $category->title, ['class' => 'form-control']) }}
					</div>	
					<div class="form-group">
						{{ Form::label('slug', 'Идентификатор') }}
						{{ Form::text('slug', $category->slug, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('parent_id', 'Родитель') }}
						{{ Form::select('parent_id', $categoriesForSelectList, $category->parent_id, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Описание') }}
						{{ Form::textarea('description', $category->description, ['class' => 'form-control', 'rows' => 3]) }}
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	