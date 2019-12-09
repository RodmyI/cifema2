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
                <h3 class="card-title">Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><strong>Nombre: </strong>{{ $role->name }}</p>
                <p><strong>Slug: </strong>{{ $role->slug }}</p>
                <p><strong>Descipción: </strong>{{ $role->description }}</p>
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