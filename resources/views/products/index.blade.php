@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Productos</h1>
            @can('product.create')
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
            @endcan
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
            <h3 class="card-title">Filtar Productos</h3><br>
            <form name="filter_products" action="{{ route('products.index') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input type="text" name="name" class="form-control" value="" placeholder="Nombre" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    {{ Form::submit('FILTRAR', ['class' => 'btn btn-default']) }}
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($products->count()>0)
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                      @can('products.show')
                      <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
                      @endcan
                      @can('products.edit')
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('products.destroy')
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                  		  <input type="hidden" name="_method" value="DELETE">
                  		  <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="3">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>#</td>
                  <td>Nombre</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
          </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{ $products->links() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection