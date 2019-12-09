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
                <h3 class="card-title">Usuarios</h3>
                @can('user.create')
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th colspan="3">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td width="10px">
                        @can('users.show')
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-default btn-sm">Ver</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('users.edit')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-sm">Editar</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('users.destroy')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                          {{ csrf_field() }}
                		  <input type="hidden" name="_method" value="DELETE">
                		  <button class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $users->render() }}
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</div>

@endsection