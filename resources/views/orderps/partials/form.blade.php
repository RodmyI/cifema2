<div class="row">
	<div class="col-md-2 col-xs-3">
		<div class="form-group">
			{{ Form::label('number', 'Número*') }}
		    {{ Form::text('number', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('number')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-5 col-xs-9">
		@php
		$parray = [];
		foreach($products as $product){
			$parray += [$product->id => $product->name];
		}
		@endphp
		<div class="form-group">
			{{ Form::label('product_id', 'Producto*') }}
			{{ Form::select('product_id', $parray, null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('product_id')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-2 col-xs-6">
		<div class="form-group">
			{{ Form::label('quantity', 'Cantidad*') }}
		    {{ Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('quantity')
		    	<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			{{ Form::label('dateinit', 'Fecha Inicio*') }}
		    {{ Form::date('dateinit', null, ['class' => 'form-control', 'required' => 'required']) }}
		    @error('dateinit')
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