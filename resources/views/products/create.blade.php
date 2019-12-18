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
                <form name="f-create-product" action="{{ route('products.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Nombre*</label>
                      <input type="text" name="name" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Unidad*</label>
                      <input type="text" name="unit" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Cantidad Inicial*</label>
                      <input type="text" name="cantidadinit" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Codigo*</label>
                      <input type="text" name="code" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                      <input type="submit" name="Submit" class="btn btn-sm btn-primary" value="Guardar" >
                  </div>
                </form>
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