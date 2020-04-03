@extends('master.master')
@section('titulo','Empeños')
@section('contenido')

<div id="Empeños">
	<div class="container">
		<div class="row">
		<div class="col-8">
		<input type="text" placeholder="Escriba el nombre del articulo" class="form-control" v-model="buscar" value="buscar">
		</div>
	</div>

		<h1 class="text center text-primary">Agregar Empeño</h1>
		<br><br>
		<div class="row">
			<div class="col-8">
				<input type="text" name="" placeholder="Nombre del Artículo" class="form-control" v-model="nombre_articulo">
			<input type="text" name="" placeholder="Descripción" class="form-control" v-model="descripcion">


		<select class="form-control" v-model="id_mutuario" @change="getEmpeños">
			<option disabled="">Elija un Mutuario</option>
			<option v-for="M in mutuarios" v-bind:value="M.id_mutuario">@{{M.nombre}} @{{M.apellido_p}} @{{M.apellido_m}}</option>
		</select>

				<input type="date" name="" placeholder="fecha_empenio" class="form-control" v-model="fecha_empenio">
				<input type="number" name="" placeholder="Limite" class="form-control" v-model="limite">
				<input type="number" name="" placeholder="Status" class="form-control" v-model="status">

				<input type="text" name="" placeholder="Capital" class="form-control" v-model="capital">

			</div>
			<div class="col-xs-4">
				<button class="btn btn-primary fa fa-refresh btn-block" 
				v-on:click="updateEmpeño(auxEmpeño)" v-if="editando"> Actualizar</button><br><br>

				<button class="btn btn-danger fa fa-remove btn-block" 
				v-on:click="cancelarEdit()"> Cancelar</button><br><br>

				<button class="btn btn-success fa fa-plus-square btn-block" 
				v-on:click="agregarEmpeño()" v-if=!editando> Agregar</button>
			</div>
		</div>
	</div>
	<br><br>

	<div class="container">
		<table class="table table-bordered table-hover" style="background-color: lightgreen">

			<thead class="tab" style="background-color: black">
				<th style="color: white" width="10%">Id_empeño</th>
				<th style="color: white">Nombre_arti</th>
				<th style="color: white" width="10%">Descripción</th>
				<th style="color: white">Fecha</th>
				<th style="color: white">Limite de dias</th>
				<th style="color: white">Status</th>
				<th style="color: white">Capital</th>
				<th style="color: white" width="10%">Id_mutuario</th>
				<th style="color: white" width="10%">Opciones</th>
			</thead>
			<tbody>
				<tr v-for="emp in filtroEmpeños" class="teb">
					<td width="10%">@{{ emp.id_empenio }}</td>
					<td>@{{ emp.nombre_articulo }}</td>
					<td>@{{ emp.descripcion }}</td>
					<td>@{{ emp.fecha_empenio }}</td>
					<td>@{{ emp.limite }}</td>
					<td>@{{ emp.status }}</td>
					<td>@{{ emp.capital }}</td>
					<td width="10%">@{{ emp.id_mutuario }}</td>
					<td width="10%">
						<span class="btn btn-outline-primary btn-xs fa fa-pencil" 
						v-on:click="editEmpeño(emp.id_empenio)"></span>

						<span class="btn btn-outline-danger btn-xs fa fa-trash" 
						v-on:click="eliminarEmpeño(emp.id_empenio)"></span>
					</td>
				</tr>
			</tbody>
		</table>		
	</div>	
</div>

@endsection
@push('scripts')
<script src="js/vue-resource.js"></script>
<script src="js/Empeños/empeños.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">