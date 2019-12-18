<div class="form-group">
	{{ Form::label('name', 'Nombre*') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('name')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción*') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('description')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>
<hr>
<h5>Permiso Especial</h5>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acceso Total</label>
	<label>{{ Form::radio('special', 'no-access') }} Ningún Acceso</label>
</div>
<hr>
<h5>Lista de Permisos</h5>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
			<li>
				<label>
					{{ Form::checkbox('permissions[]', $permission->id, null) }}
					{{ $permission->name }}
					<em>{{ $permission->description ?: 'N/A' }}</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>