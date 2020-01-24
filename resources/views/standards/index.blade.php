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
                    <th width="175px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orderps as $orderp)
                  <tr>
                    <td>{{ $orderp->id }}</td>
                    <td>{{ $orderp->number }}</td>
                    @php
                      $product = App\Product::findOrFail($orderp->product_id);
                    @endphp
                    <td>{{ $product->name }}</td>
                    <td>
                      @can('standards.create')
                      <a href="{{ route('standards.create', $orderp->id) }}" class="btn btn-success btn-sm" title="Adicionar"><i class="fas fa-plus-square"></i></a>
                      @endcan
                      @can('standards.show')
                      <a href="{{ route('standards.show', $orderp->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                      @endcan
                      @can('standards.edit')
                      <a href="{{ route('standards.edit', $orderp->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('standards.destroy')
                      <form action="{{ route('standards.destroy', $orderp->id) }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                  		  <input type="hidden" name="_method" value="DELETE">
                  		  <button class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @endforeach
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