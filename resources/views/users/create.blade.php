@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registrar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form name="f-create-user" action="{{ route('users.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="name">Nombre*</label>
                      <input type="text" name="name" class="form-control" value="" required="required" >
                  </div>
                  <div class="form-group">
                    <label for="email">Email*</label>
                      <input type="email" name="email" class="form-control" value="" required="required" >
                  </div>
                  <div class="form-group">
                    <label for="password">Contraceña:</label>
                    <input type="password" class="form-control" name="password" value="">
                  </div>
                  <hr>
                  <h5>Lista de Roles</h5>
                  <div class="form-group">
                    <ul class="list-unstyled">
                      @foreach($roles as $rol)
                        <li>
                          <label>
                            {{ Form::checkbox('roles[]', $rol->id, null) }}
                            {{ $rol->name }}: 
                            <em>{{ $rol->description ?: 'N/A' }}</em>
                          </label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="Submit" class="btn btn-sm btn-primary" value="Guardar" >
                  </div>
                </form>
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
</div>

@endsection