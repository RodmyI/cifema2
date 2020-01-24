@extends('theme.lte.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Categorias de Materiales</h1>
        @can('typemats.create')
        <a href="{{ route('typemats.create') }}" class="btn btn-primary btn-sm float-right">Añadir</a>
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
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th width="115px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($typemats->count()>0)
                  @php $page_num = $typemats->currentPage();
                  $row_num = 1 + (($page_num-1) * $typemats->perPage()); @endphp
                  @foreach($typemats as $typemat)
                  <tr>
                    <td>{{ $row_num }}</td>
                    <td>{{ $typemat->name }}</td>
                    <td>
                      @can('typemats.edit')
                      <a href="{{ route('typemats.edit', $typemat->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                      @endcan
                      @can('typemats.destroy')
                      <form action="{{ route('typemats.destroy', $typemat->id) }}" method="POST" style="display: inline;">
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
            {{ $typemats->links() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection