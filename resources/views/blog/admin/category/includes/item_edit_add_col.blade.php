@php 
/** 
 * @var array $categoryForEdit |App|Models|BlogCategory 
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
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					ID: {{ $categoryForEdit->id }}
				</div>	
			</div>	
		</div>	
	</div>
	<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">	
						<div class="form-group">
							<label for="title">Создано</label>
							<input name="title" value="{{ $categoryForEdit->created_at }}" class="form-control" disabled>
						</div>	
						<div class="form-group">
							<label for="title">Изменено</label>
							<input name="title" value="{{ $categoryForEdit->updated_at }}" class="form-control" disabled>
						</div>	
						<div class="form-group">
							<label for="title">Удалено</label>
							<input name="title" value="{{ $categoryForEdit->deleted_at }}" class="form-control" disabled>
						</div>	
				</div>
			</div>
		</div>	
	</div>		
</div>	