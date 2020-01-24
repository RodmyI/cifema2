@extends('theme.lte.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Editar Salida de Material</h1>
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
          <div class="card-header thead-dark">
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            {!! Form::model($outputmp, ['route' => ['outputmps.update', $outputmp->id], 'method' => 'PUT']) !!}
              @include('outputmps.partials.editform')
            {!! Form::close() !!}
            <table id="row_standares" style="display: none;">
              <tr>
                <td>
                  <span></span>
                  <input type="hidden" name="material_id[]" value="0">
                  <input type="text" name="material[]" class="form-control material_km" autocomplete="off" placeholder="Buscar Material">
                </td>
                <td>
                  <input type="text" name="quantity_mat[]" value="0" class="form-control">
                </td>
                <td><a href="#" class="addrow btn btn-success" title="Adicionar"><i class="fas fa-plus-square"></i></a> <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a></td>
              </tr>
            </table>
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