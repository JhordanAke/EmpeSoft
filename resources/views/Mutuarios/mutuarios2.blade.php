@extends('Administrador.adminis')
@section('titulo','Mutuarios')
@section('contenido')
	<div id="mutuarios">
	<div class="container">

	<div class="row">
		<div class="col-xs-8">
		<input type="text" placeholder="Escriba el nombre o el apellido paterno del mutuario" class="form-control" v-model="buscar" value="buscar">
		</div>
	</div>
	<br>
		<h1 class="text center text-primary">Agregar Mutuario</h1>
		<button class="btn btn-success glyphicon glyphicon-user" v-on:click="showModal()">Agregar</button><br><br>
		<a href="{{url('empe')}}"><button class="btn btn-warning btn-toolbar">Realizar empeño</button></a>
		<br><br>
			<table class="table table-bordered">
				<thead style="background-color: black">
					<th style="color: white">Id</th>
					<th style="color: white">Nombre</th>
					<th style="color: white">Apellido Paterno</th>
					<th style="color: white">Apellido Materno</th>
					<th style="color: white">Telefono</th>
					<th style="color: white">Dirección</th>
					<th style="color: white">Localidad</th>
					<th style="color: white">Opciones</th>
				</thead>
				<tbody>
					<tr v-for="mutu in filtroMutuario" style="background-color: lightgreen">
						<td>@{{ mutu.id_mutuario }}</td>
						<td>@{{ mutu.nombre }}</td>
						<td>@{{ mutu.apellido_p }}</td>
						<td>@{{ mutu.apellido_m }}</td>
						<td>@{{ mutu.telefono }}</td>
						<td>@{{ mutu.direccion }}</td>
						<td>@{{ mutu.localidad }}</td>
						<td>
							<span class="btn btn-primary btn-xs fa fa-pencil" v-on:click="editMutuario(mutu.id_mutuario)"></span>
							<span class="btn btn-danger btn-xs glyphicon fa fa-trash" v-on:click="eliminarMutuario(mutu.id_mutuario)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_mutuarios">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Mutuario Nuevo</h4>
							<h4 class="modal-title" v-if="editando">Editar Datos Mutuario</h4>

						</div>
			<div class="modal-body">
					<input type="text" placeholder="nombre" class="form-control" v-model="nombre">
					<input type="text" placeholder="apellido Paterno" class="form-control" v-model="apellido_p">
					<input type="text" placeholder="apellido Materno" class="form-control" v-model="apellido_m">
					<input type="number" placeholder="Telefono" class="form-control" v-model="telefono">
					<input type="text" placeholder="Dirección" class="form-control" v-model="direccion">
					<input type="text" placeholder="Localidad" class="form-control" v-model="localidad">
							
						</div>
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
							<button type="submit" class="btn btn-primary" v-on:click="agregarMutuario()" v-if="!editando">Guardar</button>

							<button type="submit" class="btn btn-primary" v-on:click="updateMutuario(auxMutuario)" v-if="editando">Actualizar</button>
							

						</div>
					</div><!-- /.modal-content -->
				</div>
			</div> <!-- /.modal -->
		</div>
@endsection
@push('scripts')
		<script src="js/vue.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/Mutuarios/mutuarios.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">