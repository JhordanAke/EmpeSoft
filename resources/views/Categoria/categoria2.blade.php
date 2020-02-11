@extends('master.master')
@section('titulo','Categorias')
@section('contenido')

<div id="Categoria">

	<div class="row">
		<div class="col-xs-8">
		<input type="text" placeholder="Escriba el nombre de la categoria" class="form-control" v-model="buscar" value="buscar">
		</div>
	</div>
	<br>
	 <button class="btn btn-success glyphicon glyphicon-user" v-on:click="showModal()">Agregar</button>
	<br><br>
	<table class="table table-bordered table-hover table-striped" style="background-color: lightgreen">
		<thead style="background-color: #000">
			<th style="color: white">Id</th>
			<th style="color: white">Nombre</th>
			<th style="color: white">Interes</th>
			<th style="color: white">Opciones</th>
		</thead>
		<tbody>
			<tr v-for="cate in filtroCategorias">
				<td>@{{cate.id_categoria}}</td>
				<td>@{{cate.nombre}}</td>
				<td>@{{cate.tasa_interes}}%	</td>
				<td>
					<span class="btn btn-primary btn-xs glyphicon glyphicon-pencil" v-on:click="editPuesto(cate.id_categoria)"></span>
					<span class="btn btn-danger btn-xs glyphicon glyphicon-trash" v-on:click="eliminarCategoria(cate.id_categoria,cate.nombre)"></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_categorias">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" v-on:click="salir">x</span></button>
					<h4 class="modal-title" v-if="!editando">Categoria</h4>
					<h4 class="modal-title" v-if="editando">Editar Categoria</h4>
				</div>
				<div class="modal-body">
					<input type="number" v-if="editando" placeholder="Id" class="form-control" v-model="id_categoria">
					<input type="text" placeholder="Nombre" class="form-control" v-model="nombre">
					<input type="number" placeholder="Interes" class="form-control" v-model="tasa_interes">
				
				</div>
				<div class="modal-footer">
					<h6>Nombre:@{{nombre}}</h6>
					<h6>Interes:@{{tasa_interes}}</h6>
 			<button type="submit" class="btn btn-primary" v-on:click="agregarCategoria()" v-if="!editando">Guardar</button>
					<button type="submit" class="btn btn-primary" v-on:click="updateCategoria(auxCategoria)" v-if="editando">Actualizar</button>
					<!-- <button type="submit" class="btn btn-danger" v-if="editando" v-on:click="salir">Cancelar</button> -->
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
 <script src="js/Categoria/categoria.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">