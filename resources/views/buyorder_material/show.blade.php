@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Orden de Compra: <em>Nro. {{ $buyorder->number }}</em></h1>
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
                <div class="row">
                  <div class="col-md-4 col-xs-12">
                    @php $product = App\Orderp::findOrFail($buyorder->orderp_id)->product; @endphp
                    @php $orderp = App\Orderp::findOrFail($buyorder->orderp_id); @endphp
                    <p><b>OP {{ $orderp->number }} - {{ $product->name }} - {{ $orderp->quantity }} Pza.</b></p>
                  </div>
                  <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                    {{ Form::label('date_issue', 'Fecha de Emisión') }}
                    {{ date("d/m/Y", strtotime($buyorder->date_issue)) }}
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
                <div class="row">
                  <div class="col-md-12">
                    <table id="standares" class="table table-bordered table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>COD - Nombre Material - Unidad</th>
                          <th>Cantidad Requerida</th>
                          <th>Observaciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($materials as $material)
                          <tr>
                            <td>
                              <span>{{ $material->code.' - '.$material->name.' - '.$material->unity }}</span>
                            </td>
                            <td>
                              {{ $material->pivot->quantity }}
                            </td>
                            <td>
                              {{ $material->pivot->observation }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                @if($buyorder->status==0)
                <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('buyorder_material.exportpdf', $buyorder->id) }}" ><i class="fas fa-print"></i> Imprimir</a>
                  </div>
                </div>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</section>

@endsection