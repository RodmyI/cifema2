<div class="form-group">
	{{ Form::label('name', 'Nombre*') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>
<hr>
<h5>Lista de Roles</h5>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $rol)
			<li>
				<label>
					{{ Form::checkbox('roles[]', $rol->id, null) }}
					{{ $rol->name }}
					<em>{{ $rol->description ?: 'N/A' }}</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>