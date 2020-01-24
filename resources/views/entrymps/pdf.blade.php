<!DOCTYPE html>
<html>
<head>
<title></title>
<style type="text/css">
	.table_top{
		width: 100%;
		border: 1px solid #999999;
	}
	.table_primary{
		width: 100%;
		border: 1px solid #999999;
	}
	.text-center{
		text-align: center;
		font-weight: bold;
	}
	.table_top td, .table_top th {
		margin: 0px;
	    padding: 0.3rem;
	    border-bottom: 1px solid #999999;
	}
	.table_firma{
		width: 100%;
	}
	.table_firma td.line{
		border-top: 1px solid #999999;
	}
</style>
</head>
<body>
	<table class="table_primary">
		<tbody>
			<tr>
				<td colspan="4"><h3 class="text-center">Ingreso de Material Nro. {{ $entrymp->number }}</h3></td>
			</tr>
			<tr>
	            <td>Tipo de Documento</td>
	            <td>Nro. de Documento</td>
	            <td>Proveedor</td>
	            <td>Cantidad</td>
			</tr>
			<tr>
	            <td>{{ $entrymp->document_type }}</td>
	            <td>{{ $entrymp->document_number }}</td>
	            <td>{{ $entrymp->provider }}</td>
	            <td>{{ date("d/m/Y", strtotime($entrymp->date_entry)) }}</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="table_top" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
	            <th>Categoría</th>
	            <th>Nombre Material</th>
	            <th>Cantidad</th>
			</tr>
		</thead>
		<tbody>
            @foreach($materials as $material)
              <tr>
                <td>
                  @php $cat_mat = App\Material::findOrFail($material->id)->typemat; @endphp
                  {{ $cat_mat->name }}
                </td>
                <td>
                  {{ $material->code.' - '.$material->name.' - '.$material->unity }}
                </td>
                <td>
                  {{ $material->pivot->quantity }}
                </td>
              </tr>
            @endforeach
		</tbody>
	</table>
      <br><br><br><br><br>
      <table class="table_firma">
        <tbody>
          @php $roles = auth()->user()->roles; @endphp
          <tr>
            <td width="5%" class="text-center">&nbsp;</td>
            <td width="35%" class="text-center line">
              {{ auth()->user()->name }}<br>
              Entregado por: {{ $roles[0]->name }}
            </td>
            <td width="20%" class="text-center">&nbsp;</td>
            <td width="35%" class="text-center line">
              {{ $entrymp->received_by }}<br>
              Recibido por.
            </td>
            <td width="5%" class="text-center">&nbsp;</td>
          </tr>
        </tbody>
      </table>
</body>
</html>