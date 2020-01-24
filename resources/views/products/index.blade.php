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
            <h3 class="card-title">Productos</h3>
            @can('product.create')
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Añadir</a>
            @endcan
            <br>
            <hr>
            <form name="filter_products" action="{{ route('products.index') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">{{ session('name_s') }}
                      <input type="text" name="name" class="form-control form-control-sm" value="@if( !is_null(session('name_s'))) {{ session('name_s') }} @endif" placeholder="Nombre" >
                  </div>
                </div>
                <div class="col-md-3">
                  @php
                    $typepts = App\Typept::get();
                    $parray = [''=>'Seleccionar...'];
                    foreach($typepts as $typept){
                      $parray += [$typept->id => $typept->name];
                    }
                  @endphp
                  <div class="form-group">
                    @php $attrit_typept = null; @endphp
                    @if( !is_null(session('typept_id_s')) )
                      @php $attrit_typept = session('typept_id_s'); @endphp
                    @endif
                      {{ Form::select('typept_id', $parray, $attrit_typept, ['class' => 'form-control form-control-sm']) }}
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    {{ Form::submit('FILTRAR', ['class' => 'btn btn-default btn-sm']) }}
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
                  <th>Categoría</th>
                  <th>Estado</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($products->count()>0)
                 @php  $page_num = $products->currentPage();
                  $row_num = 1 + (($page_num-1) * $products->perPage()); @endphp
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $row_num }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                      @php
                        $myproduct = App\Product::find($product->id);
                      @endphp
                      {{ $myproduct->typept->name }}</td>
                    <td>
                      @if($product->status)
                        <span>@php echo 'Habilitado'; @endphp</span>
                      @else
                        <span class="text-danger">@php echo 'Deshabilitado'; @endphp</span>
                      @endif
                    </td>
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
                  @php $row_num++; @endphp
                  @endforeach
                @else
                <tr>
                  <td colspan="5">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>#</td>
                  <td>Nombre</td>
                  <td>Categoría</td>
                  <td>Estado</td>
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