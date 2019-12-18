@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Materiales</h1>
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
            <h3 class="card-title"></h3>
            @can('material.create')
            <a href="{{ route('materials.create') }}" class="btn btn-primary btn-sm float-right">Añadir</a>
            @endcan
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($materials->count()>0)
                  @foreach($materials as $material)
                  <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->name }}</td>
                    <td>
                      @can('materials.show')
                      <a href="{{ route('materials.show', $material->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                      @endcan
                      @can('materials.edit')
                      <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('materials.destroy')
                      <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                  		  <input type="hidden" name="_method" value="DELETE">
                  		  <button class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="3">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>#</td>
                  <td>Nombre</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{ $materials->render() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection