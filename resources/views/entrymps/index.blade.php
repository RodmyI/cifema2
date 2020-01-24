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
            <h3 class="card-title">Ingresos de Materiales</h3>
            @can('entrymps.create')
            <a href="{{ route('entrymps.create') }}" class="btn btn-primary btn-sm float-right">Registrar</a>
            @endcan
            <br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-bordered table-striped table-hover">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">Nro.</th>
                  <th>Fecha</th>
                  <th>Tipo Doc.</th>
                  <th>Nro. Doc.</th>
                  <th>Proveedor</th>
                  <th width="135px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @if($entrymps->count()>0)
                  @foreach($entrymps as $entrymp)
                  <tr>
                    <td>{{ $entrymp->number }}</td>
                    <td>{{ date("d/m/Y", strtotime($entrymp->date_entry)) }}</td>
                    <td>{{ $entrymp->document_type }}</td>
                    <td>{{ $entrymp->document_number }}</td>
                    <td>{{ $entrymp->provider }}</td>
                    <td>
                      @can('entrymps.show')
                        <a href="{{ route('entrymps.show', $entrymp->id) }}" class="btn btn-secondary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                      @endcan
                      @if($entrymp->status==0)
                        @can('entrymps.edit')
                          <a href="{{ route('entrymps.edit', $entrymp->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('entrymps.destroy')
                          <form action="{{ route('entrymps.destroy', $entrymp->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }}
                      		  <input type="hidden" name="_method" value="DELETE">
                      		  <button class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                          </form>
                        @endcan
                      @endif
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="6">No se tienen elementos.</td>
                </tr>
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <td>Nro.</td>
                  <td>Fecha</td>
                  <td>Tipo Doc.</td>
                  <td>Nro. Doc.</td>
                  <td>Proveedor</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{ $entrymps->render() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection