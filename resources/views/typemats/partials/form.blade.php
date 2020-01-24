<div class="form-group">
	{{ Form::label('name', 'Nombre*') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('name')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>