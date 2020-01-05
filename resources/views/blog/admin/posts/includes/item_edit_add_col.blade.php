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
					<button type="submit" class="btn btn-primary">Сохранить</button>
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
							<label for="created_at">Создано</label>
							<input name="created_at" value="{{ $post->created_at }}" class="form-control" disabled>
						</div>	
						<div class="form-group">
							<label for="updated_at">Изменено</label>
							<input name="updated_at" value="{{ $post->updated_at }}" class="form-control" disabled>
						</div>	
						<div class="form-group">
							<label for="published_at">Опубликовано</label>
							<input name="published_at" value="{{ ($post->is_published) ? $post->published_at : '' }}" class="form-control" disabled>
						</div>	
				</div>
			</div>
		</div>	
	</div>		
@endif	
</div>	