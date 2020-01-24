@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Editar Orden de Compra: <em>{{ $buyorder->number }}</em></h1>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {!! Form::model($buyorder, ['route' => ['buyorder_material.update', $buyorder->id], 'method' => 'PUT']) !!}
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      @php $product = App\Orderp::findOrFail($buyorder->orderp_id)->product; @endphp
                      @php $orderp = App\Orderp::findOrFail($buyorder->orderp_id); @endphp
                      <p><b>OP {{ $buyorder->number }} - {{ $product->name }} - {{ $orderp->quantity }} Pza.</b></p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                      {{ Form::label('date_issue', 'Fecha de Emisión') }}
                      {{ Form::date('date_issue', null, ['class' => 'form-control', 'required' => 'required']) }}
                      @error('typemat_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>  
                    <div class="col-md-4 col-xs-12">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <h3 class="text-center">Materiales</h3>
                    </div>
                  </div>
                  @include('buyorder_material.partials.form')
                {!! Form::close() !!}
                <table id="row_standares" style="display: none;">
                  <tr>
                    <td>
                      <span></span>
                      <input type="hidden" name="material_id[]" value="0">
                      <input type="hidden" name="class_item[]" value="2">
                      <input type="text" name="material[]" class="form-control material_oc" autocomplete="off" placeholder="Buscar Material">
                    </td>
                    <td>
                      <input type="text" name="quantity_mat[]" value="0" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="observation_mat[]" value="" class="form-control">
                    </td>
                    <td><a href="#" class="addrow btn btn-success" title="Adicionar"><i class="fas fa-plus-square"></i></a> <a href="#" class="deleterow btn btn-danger" title="Eliminar"><i class="fas fa-minus-square"></i></a></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
              <!--<div class="card-footer clearfix">
              </div>-->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</section>

@endsection