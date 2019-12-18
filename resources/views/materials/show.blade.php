@extends('theme.lte.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Material</h1>
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
                <p><strong>Nombre: </strong>{{ $material->name }}</p>
                <p><strong>Unidad: </strong>{{ $material->unity }}</p>
                <p><strong>Cantidad Inicial: </strong>{{ $material->quantityinit }}</p>
                <p><strong>Codigo: </strong>{{ $material->code }}</p>
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
</div>

@endsection