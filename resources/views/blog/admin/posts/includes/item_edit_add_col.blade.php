@php 
/** 
 * @var array $post |App|Models|BlogPost 
 */ 
@endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
				</div>	
			</div>	
		</div>
@if($post->exists)			
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					ID: {{ $post->id }}
				</div>	
			</div>	
		</div>	
	</div>
	<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">	
						<div class="form-group">
							{{ Form::label('created_at', 'Создано') }}
							{{ Form::text('created_at', $post->created_at, ['class' => 'form-control', 'disabled' => true]) }}
						</div>	
						<div class="form-group">
							{{ Form::label('updated_at', 'Изменено') }}
							{{ Form::text('updated_at', $post->updated_at, ['class' => 'form-control', 'disabled' => true]) }}
						</div>	
						<div class="form-group">
							{{ Form::label('published_at', 'Опубликовано') }}
							{{ Form::text('published_at', ($post->is_published) ? $post->published_at : '', ['class' => 'form-control', 'disabled' => true]) }}
						</div>
				</div>
			</div>
		</div>	
	</div>		
@endif	
</div>	