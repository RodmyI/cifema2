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
			{{ Form::label('date_dev', 'Fecha*') }}
		    {{ Form::date('date_dev', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('date_dev')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('received_by', 'Recervado por*') }}
		    {{ Form::text('received_by', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('received_by')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<hr>
		<h3 class="text-center">Materiales</h3>
	    <table id="standares" class="table table-bordered table-striped">
	      <thead class="thead-dark">
	        <tr>
	          <th>Nombre Material</th>
	          <th>Cant. Estandar</th>
	          <th>Cant. Entregada</th>
	          <th>Cant. Salida</th>
	          <th>Observaciones</th>
	          <th width="120px"><a href="#" class="addrow btn btn-success btn-sm" title="Adicionar"><i class="fas fa-plus-square"></i></a></th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($devolutionmp->materials as $material)
	          <tr>
	            <td><input type="hidden" name="material_id[]" value="{{ $material->pivot->material_id }}"/>
	            	{{ $material->code.' - '.$material->name.' - '.$material->unity }}
	            </td>
	            <td><input type="hidden" name="quantity_standard[]" value="{{ $material->pivot->quantity_standard }}"/>
	            	{{ $material->pivot->quantity_standard }}</td>
	            <td><input type="hidden" name="delivered_quantity[]" value="{{ $material->pivot->delivered_quantity }}"/>
	            	{{ $material->pivot->delivered_quantity }}</td>
	            <td><input type="text" name="quantity_output[]" class="form-control" value="{{ $material->pivot->quantity_output }}"/></td>
	            <td><input type="text" name="observation[]" class="form-control" value="{{ $material->pivot->observation }}"/></td>
	            <td>
		            <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a>
		        </td>
	          </tr>
        	@endforeach
	      </tbody>
	    </table>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="form-group">
		    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>
</div>