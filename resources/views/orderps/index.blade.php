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
            <h3 class="card-title">Ordenes de Producción</h3>
            @can('orderps.create')
            <a href="{{ route('orderps.create') }}" class="btn btn-primary btn-sm float-right">Añadir</a>
            @endcan
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Número de Orden</th>
                    <th>Nombre Producto</th>
                    <th width="135px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @if($orderps->count()>0)
                    @php $page_num = $orderps->currentPage();
                    $row_num = 1 + (($page_num-1) * $orderps->perPage()); @endphp
                    @foreach($orderps as $orderp)
                    <tr>
                      <td>{{ $row_num }}</td>
                      <td>{{ $orderp->number }}</td>
                      @php
                        $product = App\Product::findOrFail($orderp->product_id);
                      @endphp
                      <td>{{ $product->name }}</td>
                      <td>
                        @can('orderps.show')
                        <a href="{{ route('orderps.show', $orderp->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('orderps.edit')
                        <a href="{{ route('orderps.edit', $orderp->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('orderps.destroy')
                        <form action="{{ route('orderps.destroy', $orderp->id) }}" method="POST" style="display: inline;">
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
                    <td colspan="4">No se tienen elementos.</td>
                  </tr>
                  @endif
                </tbody>
                <tfoot class="thead-dark">
                  <tr>
                    <td>#</td>
                    <td>Número de Orden</td>
                    <td>Nombre Producto</td>
                    <td>&nbsp;</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{ $orderps->render() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection