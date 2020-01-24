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
                <table class="table">
                  <tbody>
                    <tr>
                      <td><h3 class="text-center">Salida de Material</h3></td>
                      <td width="20%">Nro.: {{ $outputmp->number }}</td>
                    </tr>
                  </tbody>
                </table>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>O.P.</th>
                            <th>Producto a Fabricar</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @php $orderp = $outputmp->orderp; @endphp
                            <td>{{ $orderp->number }}</td>
                            @php $product = $orderp->product; @endphp
                            <td>{{ $product->name }}</td>
                            <td>{{ $orderp->quantity }}</td>
                            <td>{{ date("d/m/Y", strtotime($outputmp->date_output)) }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Nombre Material</th>
                            <th>Cant. Estandar</th>
                            <th>Cant. Disponible</th>
                            <th>Cant. Entregada</th>
                            <th>Cant. Salida</th>
                            <th>Observaciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($outputmp->materials as $material)
                              <tr>
                                <td>{{ $material->code.' - '.$material->name.' - '.$material->unity }}</td>
                                <td>{{ $material->pivot->quantity_standard }}</td>
                                <td>{{ $material->pivot->quantity_available }}</td>
                                <td>{{ $material->pivot->delivered_quantity }}</td>
                                <td>{{ $material->pivot->quantity_output }}</td>
                                <td>{{ $material->pivot->observation }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <br><br><br><br><br>
                      <table class="table">
                        <tbody>
                          @php $roles = auth()->user()->roles; @endphp
                          <tr>
                            <td width="50%" class="text-center">
                              {{ auth()->user()->name }}<br>
                              Entregado por: {{ $roles[0]->name }}
                            </td>
                            <td width="50%" class="text-center">
                              {{ $outputmp->received_by }}<br>
                              Recibido por.
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <br><br>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('outputmps.exportpdf', $outputmp->id) }}" ><i class="fas fa-print"></i> Imprimir</a>
                  </div>
                </div>

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