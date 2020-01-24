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
				<td colspan="4"><h3 class="text-center">Salida de Material Nro. {{ $outputmp->number }}</h3></td>
			</tr>
			<tr>
                <td>O.P.</td>
                <td>Producto a Fabricar</td>
                <td>Cantidad</td>
                <td>Fecha</td>
			</tr>
			<tr>
                @php $orderp = $outputmp->orderp; @endphp
                <td>{{ $orderp->number }}</td>
                @php $product = $orderp->product; @endphp
                <td>{{ $product->name }}</td>
                <td>{{ $orderp->quantity }}</td>
                <td>{{ date("d/m/Y", strtotime($outputmp->date_output)) }}</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="table_top" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
                <th>Nombre Material</th>
                <th>Cant. Estandar</th>
                <th>Cant. Disponible</th>
                <th>Cant. Entregada</th>
                <th>Cant. Salida</th>
                <th>Observaciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach($materials as $material)
              <tr>
                <td>{{ $material->code.' - '.$material->name.' - '.$material->unity }}</td>
                <td>{{ $material->pivot->quantity_standard }}</td>
                <td>{{ $material->pivot->quantity_available }}</td>
                <td>{{ $material->pivot->delivered_quantity }}</td>
                <td>{{ $material->pivot->quantity_output }}</td>
                <td>{{ $material->pivot->observation }}</td>
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
              {{ $outputmp->received_by }}<br>
              Recibido por.
            </td>
            <td width="5%" class="text-center">&nbsp;</td>
          </tr>
        </tbody>
      </table>
</body>
</html>