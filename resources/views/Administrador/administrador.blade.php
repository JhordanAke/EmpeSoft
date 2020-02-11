@extends('Administrador.adminis')
@section('titulo','Puestos')
@section('contenido')



<h1 class="control-label label-warning"><------- Opciones</h1>

<br>
<br><br><br><br><br><br>
<div class="align-content-center">
	<div class="alert-dismissible alert-success">
		<h1>Bienvenido a la zona administrativa aquí podras encontrar diferentes opciones para realizar un cambio en tu empresa</h1>
	</div>
	
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


@endsection

<input type="hidden" name="route" value="{{url('/')}}">