@extends('master.master')
@section('titulo','Abonos')
@section('contenido')

<div id="ventas">
	<br>
	<div class="container">
		<h3>FOLIO: @{{folio}}</h3>
		<h3>Fecha Venta:@{{fecha_venta}}</h3>
		<div class="row">
			<br>
				<br>
				<button class="btn btn-warning btn-block" @click="vender()">Guardar Venta</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-6">
				<table class="table table-bordered">
					<thead style="background: #ffffcc">
						<th width="15%">Monto</th>
						<th width="15%">Fecha venta</th>
					</thead>
					<tbody>
						<tr v-for="">
							<td><input type="number"></td>
							<td><input type="date"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12 col-md">
				<table class="table table-bordered">
					<tr>
						<th width="25%" style="background: #ffffcc">Abono</th>
						<td><h2 class="text-danger">$@{{total}}</h2></td>
					</tr>

				</table>
			</div>
			
		</div>
		
	</div>
</div>

@endsection

@push('scripts')
<script src="js/vue-resource.js"></script>
<script src="js/Abono/abono.js"></script>
<script src="js/moment-with-locales.min.js"></script>
@endpush