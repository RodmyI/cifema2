<?php 
function showEdit($url)
{
    return request()->is($url) ? true : false;
}
?>
<div class="row">
  <div class="col-md-4 colo-xs-12">
  	@php
	  $parray = [''=>'Seleccionar...'];
	  foreach($typepts as $typept){
	  	$parray += [$typept->id => $typept->name];
	  }
	@endphp
	<div class="form-group">
      {{ Form::label('typept_id', 'Categoría*') }}
	  {{ Form::select('typept_id', $parray, null, ['class' => 'form-control', 'required' => 'required']) }}
      @error('typept_id')
        <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="col-md-4 colo-xs-12">
	<div class="form-group">
	  {{ Form::label('name', 'Nombre*') }}
	  {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
	  @error('name')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="col-md-4 colo-xs-12">
	<div class="form-group">
	  {{ Form::label('price', 'Precio*') }}<em>(Formato: 0.00)</em>
	  {{ Form::text('price', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '\d+(\.\d{2})?']) }}
	  @error('price')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="@if(showEdit('products/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif colo-xs-12">
	<div class="form-group">
	  {{ Form::label('cantidadinit', 'Cantidad Inicial*') }} <em>(Solo números)</em>
	  {{ Form::text('cantidadinit', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
	  @error('cantidadinit')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
	@if(showEdit('products/*/edit'))
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('stock', 'Stock*') }} <em>(Solo números)</em>
		    {{ Form::text('stock', null, ['class' => 'form-control', 'required' => 'required', 'pattern' => '[0-9]+']) }}
		</div>
	</div>
	@endif
  <div class="@if(showEdit('products/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif colo-xs-12">
	<div class="form-group">
	  {{ Form::label('unit', 'Unidad*') }}
	  {{ Form::text('unit', null, ['class' => 'form-control', 'required' => 'required']) }}
	  @error('unit')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="@if(showEdit('products/*/edit')){{'col-md-3'}}@else{{'col-md-4'}}@endif colo-xs-12">
	<div class="form-group">
	  {{ Form::label('code', 'Código*') }}
	  {{ Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) }}
	  @error('code')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="col-md-4 colo-xs-12">
	<div class="form-group">
	  @if(isset($product))
		@if($product->img_prod!='')
		  <figure>
		    <img src="{{ asset('myproducts/images/'.$product->img_prod) }}" class="img-fluid">
		    {{ Form::hidden ('old_img_prod', $product->img_prod) }}
		  </figure>
	  	@endif
	  @endif
      {{ Form::label('img_prod', 'Imagen') }}
	  {{ Form::file('img_prod', ['class' => 'form-control']) }}
      @error('img_prod')
        <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="col-md-4 colo-xs-12">
	<div class="form-group">
	  @if(isset($product))
		@if($product->data_sheet!='')
		  <figure>
		    <img src="{{ asset('myproducts/images/'.$product->data_sheet) }}" class="img-fluid">
		    {{ Form::hidden ('old_data_sheet', $product->data_sheet) }}
		  </figure>
	  	@endif
	  @endif
      {{ Form::label('data_sheet', 'Ficha Técnica') }}
	  {{ Form::file('data_sheet', ['class' => 'form-control']) }}
	  @error('data_sheet')
	    <div class="alert alert-danger">{{ $message }}</div>
	  @enderror
	</div>
  </div>
  <div class="col-md-4 colo-xs-12">
	<div class="form-group">
    	{{ Form::label('status', 'Estado del Producto') }}<br>
		<label>{{ Form::radio('status', '1', true) }} Habilitado</label>
		<label>{{ Form::radio('status', '0') }} Deshabilitado</label>
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