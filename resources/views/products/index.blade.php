@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Productos</h1>
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
                @can('product.create')
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th colspan="3">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td width="10px">
                        @can('products.show')
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-default btn-sm">Ver</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('products.edit')
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-default btn-sm">Editar</a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('products.destroy')
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                          {{ csrf_field() }}
                		  <input type="hidden" name="_method" value="DELETE">
                		  <button class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $products->render() }}
                <!--<ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>-->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
</div>

@endsection