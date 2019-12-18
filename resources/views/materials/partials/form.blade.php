<div class="row">
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('name', 'Nombre*') }}
		    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('unity', 'Unidad*') }}
		    {{ Form::text('unity', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('quantityinit', 'Cantidad Inicial*') }}
		    {{ Form::text('quantityinit', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('code', 'Codigo*') }}
		    {{ Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="form-group">
		    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>
</div>