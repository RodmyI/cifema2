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
            <h3 class="card-title">Materiales</h3>
            @can('material.create')
            <a href="{{ route('materials.create') }}" class="btn btn-primary btn-sm float-right">Añadir</a>
            @endcan
            <br>
            <hr>
            <form name="filter_materials" action="{{ route('materials.index') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-sm" value="@if( !is_null(session('name_s'))) {{ session('name_s') }} @endif" placeholder="Nombre" >
                  </div>
                </div>
                <div class="col-md-3">
                  @php
                    $typemats = App\Typemat::get();
                    $parray = [''=>'Seleccionar...'];
                    foreach($typemats as $typemat){
                      $parray += [$typemat->id => $typemat->name];
                    }
                  @endphp
                  <div class="form-group">
                    @php $attrit_typemat = null; @endphp
                    @if( !is_null(session('typemat_id_s')) )
                      @php $attrit_typemat = session('typemat_id_s'); @endphp
                    @endif
                      {{ Form::select('typemat_id', $parray, $attrit_typemat, ['class' => 'form-control form-control-sm']) }}
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    {{ Form::submit('FILTRAR', ['class' => 'btn btn-default btn-sm']) }}
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Estado</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($materials->count()>0)
                  @php  $page_num = $materials->currentPage();
                  $row_num = 1 + (($page_num-1) * $materials->perPage()); @endphp
                  @foreach($materials as $material)
                  <tr>
                    <td>{{ $row_num }}</td>
                    <td>{{ $material->name }}</td>
                    <td>
                      @php
                        $mymaterial = App\Material::find($material->id);
                      @endphp
                      {{ $mymaterial->typemat->name }}</td>
                    <td>
                      @if($material->status)
                        <span>@php echo 'Habilitado'; @endphp</span>
                      @else
                        <span class="text-danger">@php echo 'Deshabilitado'; @endphp</span>
                      @endif
                    </td>
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
                  @php $row_num++; @endphp
                  @endforeach
                @else
                <tr>
                  <td colspan="5">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>#</td>
                  <td>Nombre</td>
                  <td>Categoría</td>
                  <td>Estado</td>
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