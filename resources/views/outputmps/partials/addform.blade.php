<div class="row">
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('number', 'Nro. de boleta de salida*') }}
		    {{ Form::text('number', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
		    @error('number')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			@php $orderps_array = $orderps->pluck('number', 'id'); @endphp
			{{ Form::label('orderp_id', 'Nro. Orden de Producción*') }}
		    {{ Form::select('orderp_id', $orderps_array, null, ['class' => 'form-control','placeholder' => 'Seleccionar Nro. O.P.']) }}
		    @error('orderp_id')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('date_output', 'Fecha*') }}
		    {{ Form::date('date_output', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('date_output')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('received_by', 'Recibido por*') }}
		    {{ Form::text('received_by', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('received_by')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
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