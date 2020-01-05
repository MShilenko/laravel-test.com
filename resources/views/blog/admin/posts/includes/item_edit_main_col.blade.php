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
						<input name="is_published" type="hidden" value="0">
						<input class="form-check-input" name="is_published" type="checkbox" value="1" @if($post->is_published) checked="checked" @endif>
						<label class="form-check-label" for="is_published">Опубликовано</label>
					</div>
					<div class="form-group">
						<label for="title">Заголовок</label>
						<input name="title" value="{{ $post->title }}" id="title" type="text" class="form-control" required>
					</div>	
					<div class="form-group">
						<label for="slug">ЧПУ</label>
						<input name="slug" value="{{ $post->slug }}" id="slug" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="category_id">Родитель</label>
						<select name="category_id" id="category_id" type="text" class="form-control" placeholder="Выберите категорию" required>
							@foreach($categoriesList as $categoryList)
								<option value="{{ $categoryList->id }}"
									@if($categoryList->id == $post->category_id) selected @endif>
										{{ $categoryList->id_title }}
									</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="excerpt">Превью</label>
						<textarea name="excerpt" id="excerpt" rows="2" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
					</div>
					<div class="form-group">
						<label for="content_raw">Описание</label>
						<textarea name="description" id="content_raw" rows="6" class="form-control">{{ old('content_raw', $post->content_raw) }}</textarea>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	