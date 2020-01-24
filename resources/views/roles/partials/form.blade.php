<div class="form-group">
	{{ Form::label('name', 'Nombre*') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('name')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción*') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('description')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
</div>
<hr>
<h5>Permiso Especial</h5>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acceso Total</label>
	<label>{{ Form::radio('special', 'no-access') }} Ningún Acceso</label>
</div>
<hr>
<h5>Lista de Permisos</h5>
<div class="form-group">
<div class="row row_group_permss">
		@php $my_slug = ''; $bandslug = false; @endphp
		@foreach($permissions as $permission)
			@php  $arr_slug = explode('.',$permission->slug)[0]; @endphp
			@if($my_slug != $arr_slug)
				@if($my_slug!='')
							</ul>
						</div>
					</div>
				@endif
				@php 
				$bandslug = true;
				$my_slug = explode('.',$permission->slug)[0];
				@endphp
				<div class="col-md-3 col-xs-12">
					<div class="card_rols">
					<h5>{{ $permission->type }}</h5>
					<ul class="list-unstyled">
			@endif
			<li>
				<label>	
					{{ Form::checkbox('permissions[]', $permission->id, null) }}
					{{ $permission->name }}
				</label>
			</li>
		@endforeach
			@if($bandslug)
						</ul>
					</div>
				</div>
			@endif
</div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>