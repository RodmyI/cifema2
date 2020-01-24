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
            @can('devolutionmps.create')
            <a href="{{ route('devolutionmps.create') }}" class="btn btn-primary btn-sm float-right">Registrar</a>
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
                @if($devolutionmps->count()>0)
                  @foreach($devolutionmps as $devolutionmp)
                  @php $orderp = $devolutionmp->orderp; @endphp
                  <tr>
                    <td>{{ $devolutionmp->number }}</td>
                    <td>{{ $orderp->number }}</td>
                    <td>
                      @php $product = $orderp->product; @endphp
                      {{ $product->name }}</td>
                    <td>{{ date("d/m/Y", strtotime($devolutionmp->date_output)) }}</td>
                    <td>
                      @can('devolutionmps.show')
                        <a href="{{ route('devolutionmps.show', $devolutionmp->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                      @endcan
                      @if($devolutionmp->status==0)
                        @can('devolutionmps.edit')
                          <a href="{{ route('devolutionmps.edit', $devolutionmp->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('devolutionmps.destroy')
                          <?php /*<form action="{{ route('devolutionmps.destroy', $devolutionmp->id) }}" method="POST" style="display: inline;">
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
            {{ $devolutionmps->render() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection