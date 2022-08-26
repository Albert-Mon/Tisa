@extends('index')

@section('contenido')


<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Reportes Software</h3>
    </div>
    <div class='panel-body'>
      <fieldset>
      <br>
      <a href="{{route('altasoftware')}}"> <button type="button" class="btn btn-success">Alta Software</button></a>
      <br>

      @if(Session::has('mensaje'))  <!-- si existe una se que se llame mensaje que imprima el mensaje  -->
      <div class='alert alert-success'>{{Session::get('mensaje')}}</div> <!--manda el valor de la sesion llamada mensaje -->
      @endif
      <div class="panel-body">

                        <div class="bs-example">
                            <div class="table-responsive">
                                <table class="table table-bordered">

                                            <thead>
                                            <tr>
                                                <th >Clave</th>
                                                <th >Nombre De Software</th>
                                                <th >Descripcion</th>
                                                <th >Empleados</th>
                                                <th >Pruebas</th>
                                                <th >Fecha Inicio</th>
                                                <th >Fecha Fin</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($consulta as $c)
                                            <tr>
                                                <th >{{$c->id_software}}</th>
                                                <td>{{$c->nombre}}</td>
                                                <td>{{$c->descripcion}}</td>
                                                <td>{{$c->emple}}</td>
                                                <td>{{$c->pruebas}}</td>
                                                <td>{{$c->fecha_inicio}}</td>
                                                <td>{{$c->fecha_fin}}</td>
                                                <td>
                                                    <a href="{{route('modificarsoftware',['id_software'=>$c->id_software])}}">
                                                    <button type="button" class="btn btn-info">Modificación</button></a>
                                                    @if($c->deleted_at)
                                                    <a href="{{route('activarsoftware',['id_software'=>$c->id_software])}}">
                                                        <button type="button" class="btn btn-warning">Activar</button></a>
                                                    <a href="{{route('borrarsoftware',['id_software'=>$c->id_software])}}">
                                                        <button type="button" class="btn btn-secondary">Borrar</button></a>
                                                    @else
                                                    <a href="{{route('desactivarsoftware',['id_software'=>$c->id_software])}}">
                                                        <button type="button" class="btn btn-danger">Desactivar</button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <a href="{{url('pdfsoftware') }}"><button type="button" class="btn btn-danger">Imprimir PDF</button></a>

                                        <a href="{{ url('exportsoftware') }}"><button type="button" class="btn btn-info">Imprimir .csv</button></a>



                                    </div>
                      </div>
                    </div>
                </fieldset>

@stop
