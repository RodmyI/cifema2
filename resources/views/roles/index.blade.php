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
                <h3 class="card-title">Roles</h3>
                @can('role.create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Rol</th>
                      <th colspan="3">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($roles as $role)
                    <tr>
                      <td>{{ $role->id }}</td>
                      <td>{{ $role->name }}</td>
                      <td width="10px">
                        @can('roles.show')
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-default btn-sm">Ver</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-default btn-sm">Editar</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('roles.destroy')
                          {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                          {!! Form::close() !!}
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $roles->render() }}
                <!--<ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>-->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</div>

@endsection