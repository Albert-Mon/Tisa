@extends('index')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Consultar Reportes</h3>
    </div>
<div class="panel-body">

{{-- @if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif --}}

<a href="Reportes" style='width:150px; height:35px'  class="btn btn-primary">Agregar Reporte</a>
	<br><br>
<center>
	<table class="table table-bordered">
    <thead>
	<tr>
		<th scope="col">Clave</th>
		<th scope="col">Fecha Inicio</th>
		<th scope="col">Fecha Fin</th>
    <th scope="col">Administrador</th>
		<th scope="col">Empleado</th>
		<th scope="col">Software</th>
    <th scope="col">Revisión</th>
    <th scope="col">Estatus</th>
		<th scope="col">Operaciones</th>
    <th scope="col">Reporte</th>
    </tr>
	@foreach($consulta as $c)
	<tr>
		<th scope="row">{{$c->id_reporte}}</th>
		<td>{{$c->fecha_inicio}}</td>
    <td>{{$c->fecha_fin}}</td>
    <td>{{$c->users}}</td>
    <td>{{$c->empleados}}</td>
    <td>{{$c->software}}</td>
		<td>{{$c->revision}}</td>
		<td>{{$c->estatus}}</td>
    <td>
      <a href="ModificarReportes/{{$c->id_reporte}}/edit" class="btn btn-info">Modificar</a>
      <a href="{{route('BorrarReporte',['id_reporte'=>$c->id_reporte])}}">
          <button type="button" class="btn btn-danger">Eliminar</button></a>

	   </td>
     <td>
       <a href="pdfReporte/{{$c->id_reporte}}" class="btn btn-secondary">Descargar</a>
       </a>
     </td>
    </tr>

	@endforeach

	</table>
</center>
</div>
</div>


@stop
