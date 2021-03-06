<div class="row">
	<div class="col-md-12">
	    <table id="standares" class="table table-bordered table-striped">
	      <thead class="thead-dark">
	        <tr>
	          <th>Material</th>
	          <th>Cantidad</th>
	          <th>Observaciones</th>
	          <th width="120px"><a href="#" class="addrow btn btn-success btn-sm" title="Adicionar"><i class="fas fa-plus-square"></i></a></th>
	        </tr>
	      </thead>
	      <tbody>
	      	@if(isset($materials))
		      	@foreach($materials as $material)
		          <tr>
		            <td>
		              @php
		              	$cat = $material->typemat;
		              @endphp
		              <span>{{ $material->name.' / '.$material->code.' / '.$cat->name }}</span>
		              <input type="hidden" name="material_id[]" value="{{ $material->id }}">
		              <input type="text" name="material[]" class="form-control material_st" autocomplete="off" placeholder="Buscar Material" style="display: none;">
		            </td>
		            <td>
		              <input type="text" name="quantity_mat[]" class="form-control" value="{{ $material->pivot->quantity }}">
		            </td>
		            <td>
		              <input type="text" name="observation_mat[]" class="form-control" value="{{ $material->pivot->observation }}">
		            </td>
		            <td><a href="#" class="addrow btn btn-success" title="Adicionar"><i class="fas fa-plus-square"></i></a> <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a></td>
		          </tr>
	        	@endforeach
	      	@else
	          <tr>
	            <td>
	              <span></span>
	              <input type="hidden" name="material_id[]" value="0">
	              <input type="text" name="material[]" class="form-control material_st" autocomplete="off" placeholder="Buscar Material">
	            </td>
	            <td>
	              <input type="text" name="quantity_mat[]" value="0" class="form-control">
	            </td>
	            <td>
	              <input type="text" name="observation_mat[]" value="" class="form-control">
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