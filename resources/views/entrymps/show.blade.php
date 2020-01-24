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
                      <td><h3 class="text-center">Ingreso de Material</h3></td>
                      <td width="20%">Nro.: {{ $entrymp->number }}</td>
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
                            <th>Tipo de Documento</th>
                            <th>Nro. de Documento</th>
                            <th>Proveedor</th>
                            <th>Cantidad</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $entrymp->document_type }}</td>
                            <td>{{ $entrymp->document_number }}</td>
                            <td>{{ $entrymp->provider }}</td>
                            <td>{{ date("d/m/Y", strtotime($entrymp->date_entry)) }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Categoría</th>
                            <th>Nombre Material</th>
                            <th>Cantidad</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($materials))
                            @foreach($materials as $material)
                              <tr>
                                <td>
                                  @php $cat_mat = App\Material::findOrFail($material->id)->typemat; @endphp
                                  {{ $cat_mat->name }}
                                </td>
                                <td>
                                  {{ $material->code.' - '.$material->name.' - '.$material->unity }}
                                </td>
                                <td>
                                  {{ $material->pivot->quantity }}
                                </td>
                              </tr>
                            @endforeach
                          @endif
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
                              {{ $entrymp->received_by }}<br>
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
                    <a class="btn btn-primary" href="{{ route('entrymps.exportpdf', $entrymp->id) }}" ><i class="fas fa-print"></i> Imprimir</a>
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