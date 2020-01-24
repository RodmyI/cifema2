<div class="row">
	<div class="col-md-4 col-xs-6">
		<div class="form-group">
			{{ Form::label('number', 'Nro.*') }}
		    {{ Form::text('number', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
		    @error('number')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-4 col-xs-6">
		<div class="form-group">
			{{ Form::label('document_type', 'Tipo de documento*') }}
		    {{ Form::text('document_type', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('document_type')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-4 col-xs-6">
		<div class="form-group">
			{{ Form::label('document_number', 'Número del documento*') }}
		    {{ Form::text('document_number', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('document_number')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-4 col-xs-6">
		<div class="form-group">
			{{ Form::label('provider', 'Proveedor*') }}
		    {{ Form::text('provider', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('provider')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-4 col-xs-6">
		<div class="form-group">
			{{ Form::label('date_entry', 'Fecha*') }}
		    {{ Form::date('date_entry', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('date_entry')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-4 col-xs-6">
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
	    <table id="standares" class="table table-bordered table-striped">
	      <thead class="thead-dark">
	        <tr>
	          <th>Nombre Material</th>
	          <th>Cantidad</th>
	          <th width="120px"><a href="#" class="addrow btn btn-success btn-sm" title="Adicionar"><i class="fas fa-plus-square"></i></a></th>
	        </tr>
	      </thead>
	      <tbody>
	      	@if(isset($materials))
		      	@foreach($materials as $material)
		          <tr>
		            <td>
		              <span>{{ $material->code.' - '.$material->name.' - '.$material->unity }}</span>
		              <input type="hidden" name="material_id[]" value="{{ $material->id }}">
		              <input type="text" name="material[]" class="form-control material_km" autocomplete="off" placeholder="Buscar Material" style="display: none;">
		            </td>
		            <td>
		              <input type="text" name="quantity_mat[]" class="form-control" value="{{ $material->pivot->quantity }}">
		            </td>
		            <td>
		            	<a href="#" class="addrow btn btn-success" title="Adicionar"><i class="fas fa-plus-square"></i></a> 
			            <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a>
			        </td>
		          </tr>
	        	@endforeach
	      	@else
	          <tr>
	            <td>
	              <span></span>
	              <input type="hidden" name="material_id[]" value="0">
	              <input type="text" name="material[]" class="form-control material_km" autocomplete="off" placeholder="Buscar Material">
	            </td>
	            <td>
	              <input type="text" name="quantity_mat[]" value="0" class="form-control">
	            </td>
	            <td><a href="#" class="addrow btn btn-success" title="Adicionar"><i class="fas fa-plus-square"></i></a> <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a></td>
	          </tr>
	        @endif
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