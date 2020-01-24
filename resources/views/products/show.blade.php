@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Producto</h1>
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
                    <p><strong>Nombre: </strong>{{ $product->name }}</p>
                    <p><strong>Categoría: </strong>@php
                            $typep = App\Typept::findOrFail($product->typept_id);
                          @endphp
                          {{ $typep->name }}</p>
                    <p><strong>Precio: </strong>Bs.- {{ $product->price }}</p>
                    <p><strong>Unidad: </strong>{{ $product->unit }}</p>
                    <p><strong>Cantidad Inicial: </strong>{{ $product->cantidadinit }}</p>
                    <p><strong>Codigo: </strong>{{ $product->code }}</p>
                    <p><strong>Estado: </strong>
                      @if($product->status)
                        <span>@php echo 'Habilitado'; @endphp</span>
                      @else
                        <span class="text-danger">@php echo 'Deshabilitado'; @endphp</span>
                      @endif</p>
                  </div>
                  <div class="col-md-8 col-xs-12">
                    <div class="row">
                      <div class="col-md-4 col-xs-12">
                        <p><strong>Imagen: </strong></p>
                        @if($product->img_prod!='')
                          <figure>
                            <img src="{{ asset('myproducts/images/'.$product->img_prod) }}" class="img-fluid">
                          </figure>
                        @endif
                      </div>
                      <div class="col-md-4 col-xs-12">
                        <p><strong>Ficha Técnica: </strong></p>
                        @if($product->data_sheet!='')
                          <figure>
                            <img src="{{ asset('myproducts/images/'.$product->data_sheet) }}" class="img-fluid">
                            {{ Form::hidden ('old_data_sheet', $product->data_sheet) }}
                          </figure>
                        @endif
                      </div>
                    </div>
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