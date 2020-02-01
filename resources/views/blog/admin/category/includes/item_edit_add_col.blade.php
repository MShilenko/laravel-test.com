@php 
/** 
 * @var array $category |App|Models|BlogCategory 
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
@if($category->exists)			
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					ID: {{ $category->id }}
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
							{{ Form::text('created_at', $category->created_at, ['class' => 'form-control', 'disabled' => true]) }}
						</div>	
						<div class="form-group">
							{{ Form::label('updated_at', 'Изменено') }}
							{{ Form::text('updated_at', $category->updated_at, ['class' => 'form-control', 'disabled' => true]) }}
						</div>	
						<div class="form-group">
							{{ Form::label('deleted_at', 'Удалено') }}
							{{ Form::text('deleted_at', $category->deleted_at, ['class' => 'form-control', 'disabled' => true]) }}
						</div>	
				</div>
			</div>
		</div>	
	</div>		
@endif	
</div>	