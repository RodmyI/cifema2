@extends('theme.lte.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Usuario</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
          <div class="col-md-8 col-xs-12">
            <div class="card">
              <div class="card-header thead-dark">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {!! Form::model($user, ['route' => ['users.passwordupdate', $user->id], 'method' => 'PUT']) !!}
                	<div class="form-group">
						{{ Form::label('password', 'Contraseña Nueva*') }}
					    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
					    @error('password')
					    	<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
                	<div class="form-group">
						{{ Form::label('password_confirmation', 'Confirmar Contraseña*') }}
					    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
					    @error('password_confirmation')
					    	<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
					    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
					</div>
                {!! Form::close() !!}
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</section>

@endsection