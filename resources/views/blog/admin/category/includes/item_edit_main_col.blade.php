@php 
/** 
 * @var array $categoryForEdit |App|Models|BlogCategory 
 * @var array $categoriesListForEdeit |App|Models|BlogCategory 
 */ 
@endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">	
					<div class="form-group">
						<label for="title">Заголовок</label>
						<input name="title" value="{{ $categoryForEdit->title }}" id="title" type="text" class="form-control" required>
					</div>	
					<div class="form-group">
						<label for="title">Идентификатор</label>
						<input name="title" value="{{ $categoryForEdit->slug }}" id="slug" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="title">Родитель</label>
						<select name="parent_id" value="{{ $categoryForEdit->slug }}" id="slug" type="text" class="form-control" placeholder="Выберите категорию" required>
							@foreach($categoriesListForEdeit as $category)
								<option value="{{ $category->id }}"
									@if($category->id == $categoryForEdit->parent_id) selected @endif>
										{{ $category->id }}. {{ $category->title }}
									</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="title">Описание</label>
						<textarea name="description" value="{{ old('description', $categoryForEdit->description) }}" id="description" rows="3" class="form-control">{{ old('description', $categoryForEdit->description) }}</textarea>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>	