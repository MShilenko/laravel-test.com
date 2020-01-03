@php 
/** 
 * @var array $category |App|Models|BlogCategory 
 * @var array $categoriesList |App|Models|BlogCategory 
 */ 
@endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">	
					<div class="form-group">
						<label for="title">Заголовок</label>
						<input name="title" value="{{ $category->title }}" id="title" type="text" class="form-control" required>
					</div>	
					<div class="form-group">
						<label for="slug">Идентификатор</label>
						<input name="slug" value="{{ $category->slug }}" id="slug" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="title">Родитель</label>
						<select name="parent_id" value="{{ $category->parent_id }}" id="parent_id" type="text" class="form-control" placeholder="Выберите категорию" required>
							@foreach($categoriesList as $categoryList)
								<option value="{{ $categoryList->id }}"
									@if($categoryList->id == $category->parent_id) selected @endif>
										{{ $categoryList->id_title }}
									</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="title">Описание</label>
						<textarea name="description" value="{{ old('description', $category->description) }}" id="description" rows="3" class="form-control">{{ old('description', $category->description) }}</textarea>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	