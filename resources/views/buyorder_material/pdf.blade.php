<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.table_top{
			width: 100%;
		}
		.text-center{
			text-align: center;
			font-weight: bold;
		}
		.table_top td, .table_top th {
		    padding: .3rem;
		}
	</style>
</head>
<body>
	<table class="table_top">
		<tbody>
			<tr>
				<td colspan="2"><h3 class="text-center">Orden de Compra Nro. {{ $buyorder->number }}</h3></td>
			</tr>
			<tr>
                @php $product = App\Orderp::findOrFail($buyorder->orderp_id)->product; @endphp
                @php $orderp = App\Orderp::findOrFail($buyorder->orderp_id); @endphp
				<td>OP {{ $orderp->number }} - {{ $product->name }} - {{ $orderp->quantity }} Pza.</td>
				<td>Fecha de Emisión: {{ date("d/m/Y", strtotime($buyorder->date_issue)) }}</td>
			</tr>
		</tbody>
	</table>
	<hr>
	<h3 class="text-center">Materiales</h3>
	<hr>
	<table class="table_top">
		<thead>
			<tr>
				<th>COD - Nombre Material - Unidad</th>
				<th>Cantidad Requerida</th>
				<th>Observaciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($materials as $material)
				<tr>
					<td>
					<span>{{ $material->code.' - '.$material->name.' - '.$material->unity }}</span>
					</td>
					<td>
					{{ $material->pivot->quantity }}
					</td>
					<td>
					{{ $material->pivot->observation }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>