<?php 
function showEdit($url)
{
    return request()->is($url) ? true : false;
}
?>
<div class="row">
	<div class="col-md-6 colo-xs-12">
		@php
		  $parray = [''=>'Seleccionar...'];
		  foreach($typemats as $typemat){
		  	$parray += [$typemat->id => $typemat->name];
		  }
		@endphp
		<div class="form-group">
		  {{ Form::label('typemat_id', 'Categoría*') }}
		  {{ Form::select('typemat_id', $parray, null, ['class' => 'form-control', 'required' => 'required']) }}
		  @error('typemat_id')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="form-group">
			{{ Form::label('name', 'Nombre*') }}
		    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
	<div class="@if(showEdit('materials/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif col-xs-6">
		<div class="form-group">
			{{ Form::label('code', 'Código*') }}
		    {{ Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>
	</div>
	<div class="@if(showEdit('materials/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif col-xs-6">
		<div class="form-group">
			{{ Form::label('quantityinit', 'Cantidad Inicial*') }}
		    {{ Form::text('quantityinit', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
		</div>
	</div>
	@if(showEdit('materials/*/edit'))
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('stock', 'Stock*') }}
		    {{ Form::text('stock', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
		</div>
	</div>
	@endif
	<div class="@if(showEdit('materials/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif col-xs-6">
		<div class="form-group">
			{{ Form::label('unity', 'Unidad*') }}
		    {{ Form::text('unity', null, ['class' => 'form-control', 'required' => 'required']) }}
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