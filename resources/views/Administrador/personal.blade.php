@extends('Administrador.adminis')
@section('titulo','Personal')
@section('contenido')

<div id="Personal">
	<div class="container">
		<div class="row">
		<div class="col-xs-8">
		<input type="text" placeholder="Escriba el nombre del personal" class="form-control" v-model="buscar" value="buscar">
		</div>
	</div>
	<br>
	 <button class="btn btn-success glyphicon glyphicon-user" v-on:click="showModal()">Agregar</button>
	<br><br>
	<table class="table table-bordered table-hover table-striped" style="background-color: lightgreen">
		<thead style="background-color: #000">
			<th style="color: white">Id</th>
			<th style="color: white">Nombre</th>
			<th style="color: white">Apellido_p</th>
			<th style="color: white">Apellido_m</th>
			<th style="color: white">Contraseña</th>
			<th style="color: white">Id_puesto</th>
			<th style="color: white">Opciones</th>
		</thead>
		<tbody>
			<tr v-for="perso in filtroPersonal">
				<td>@{{perso.id_personal}}</td>
				<td>@{{perso.nombre}}</td>
				<td>@{{perso.apellido_p}}</td>
				<td>@{{perso.apellido_m}}</td>
				<td>@{{perso.contrasenia}}</td>
				<td>@{{perso.id_puesto}}</td>
				
				<td>
					<span class="btn btn-primary btn-xs glyphicon glyphicon-pencil" v-on:click="editPersonal(perso.id_personal)"></span>
					<span class="btn btn-danger btn-xs glyphicon glyphicon-trash" v-on:click="eliminarPersonal(perso.id_personal,perso.nombre)"></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_personal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" v-on:click="salir">x</span></button>
					<h4 class="modal-title" v-if="!editando">Personal</h4>
					<h4 class="modal-title" v-if="editando">Editar Personal</h4>
				</div>
				<div class="modal-body">
					<input type="text" v-if="editando" placeholder="Id_personal" class="form-control" v-model="id_personal">
					<input type="text" placeholder="Nombre" class="form-control" v-model="nombre">
					<input type="text" placeholder="Apellido_p" class="form-control" v-model="apellido_p">
					<input type="text" placeholder="Apellido_m" class="form-control" v-model="apellido_m">
					<input type="text" placeholder="Contraseña" class="form-control" v-model="contrasenia">
				<select class="form-control" v-model="id_puesto" @change="getPersonal">
			<option disabled="">Elija un Puesto</option>
			<option v-for="P in puestos" v-bind:value="P.id_puesto">@{{P.nombre}}</option>
		</select>
				
				</div>
				<div class="modal-footer">
					<h6>Nombre:@{{nombre}}</h6>
					<h6>Apellido_p:@{{apellido_p}}</h6>
					<h6>Apellido_m:@{{apellido_m}}</h6>
					<h6>Contraseña:@{{contrasenia}}</h6>
					<h6>Puesto:@{{id_puesto}}</h6>
 			<button type="submit" class="btn btn-primary" v-on:click="agregarPersonal()" v-if="!editando">Guardar</button>
					<button type="submit" class="btn btn-primary" v-on:click="updatePersonal(auxPersonal)" v-if="editando">Actualizar</button>
					<!-- <button type="submit" class="btn btn-danger" v-if="editando" v-on:click="salir">Cancelar</button> -->
				</div>
			</div>
		</div>
	</div>
   </div>
</div>{{--fin del vue--}}
@endsection
@push('scripts')
		<script src="js/vue.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/Personal/personal.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">