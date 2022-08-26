@extends('index')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Reportes Asignaciones</h3>
    </div>
<div class="panel-body">

{{-- @if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif --}}

<a href="asignaciones" style='width:150px; height:35px'  class="btn btn-primary">Agregar Registro</a>
	<br><br>
<center>
	<table class="table table-bordered">
    <thead>
	<tr>
		<th scope="col">Clave</th>
		<th scope="col">Software</th>
		<th scope="col">Administradores</th>
		<th scope="col">Empleado</th>
		<th scope="col">Fecha entrega</th>
    <th scope="col">Pruebas</th>
		<th scope="col">Operaciones</th>
    </tr>
	@foreach($consulta as $c)
	<tr>
		<th scope="row">{{$c->id_asignacion}}</th>
		<td>{{$c->software}}</td>
		<td>{{$c->users}}</td>
		<td>{{$c->empleados}}</td>
    <td>{{$c->fecha_entrega}}</td>
    <td>{{$c->pruebas}}</td>
    <td>

          <a href="ModificarAsignaciones/{{$c->id_asignacion}}/edit" class="btn btn-info">Modificar</a>
        @if($c->deleted_at)             <!--si la consulta c el campo deleted tiene info manda a llamar un campo activar -->
        <!-- viaja el id de la variable de $c en el campo clave admin-->
        <a href="{{route('ActivarAsignacion',['id_asignacion'=>$c->id_asignacion])}}">    <!-- -->
            <button type="button" class="btn btn-warning">Activar</button></a>
        <a href="{{route('BorrarAsignacion',['id_asignacion'=>$c->id_asignacion])}}">
            <button type="button" class="btn btn-secondary">Borrar</button></a>
        @else                               <!-- en dado caso que este vacio que llame a dasactivar -->
        <a href="{{route('DesactivarAsignacion',['id_asignacion'=>$c->id_asignacion])}}">
            <button type="button" class="btn btn-danger">Desactivar</button></a>
        @endif

	    </td>
    </tr>

	@endforeach

	</table>
</center>
  <a href="{{url('pdfasig') }}">
    <button type="button" class="btn btn-danger">Imprimir PDF</button>
  </a>
  <a href="{{ url('exportasig') }}">
    <button type="button" class="btn btn-info">Imprimir .csv</button>
  </a>
</div>
</div>


@stop
