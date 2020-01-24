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
            <h3 class="card-title">Salida de Materiales</h3>
            @can('outputmps.create')
            <a href="{{ route('outputmps.create') }}" class="btn btn-primary btn-sm float-right">Registrar</a>
            @endcan
            <br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 20px">Nro.</th>
                  <th>Nro. O.P.</th>
                  <th>Nombre Producto</th>
                  <th>Cantidad</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($outputmps->count()>0)
                  @foreach($outputmps as $outputmp)
                  @php $orderp = $outputmp->orderp; @endphp
                  <tr>
                    <td>{{ $outputmp->number }}</td>
                    <td>{{ $orderp->number }}</td>
                    <td>
                      @php $product = $orderp->product; @endphp
                      {{ $product->name }}</td>
                    <td>{{ date("d/m/Y", strtotime($outputmp->date_output)) }}</td>
                    <td>
                      @can('outputmps.show')
                        <a href="{{ route('outputmps.show', $outputmp->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                      @endcan
                      @if($outputmp->status==0)
                        @can('outputmps.edit')
                          <a href="{{ route('outputmps.edit', $outputmp->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('outputmps.destroy')
                          <?php /*<form action="{{ route('outputmps.destroy', $outputmp->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                      		  <input type="hidden" name="_method" value="DELETE">
                      		  <button class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                          </form>*/ ?>
                        @endcan
                      @endif
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="5">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>Nro.</td>
                  <td>Nro. O.P.</td>
                  <td>Nombre Producto</td>
                  <td>Cantidad</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{ $outputmps->render() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection