@extends('index')

@section('contenido')

<div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Empleados Registrados</h3>
                      </div>
                      <br>
                      <a href="{{route('altaempleados')}}"> <button type="button" class="btn btn-primary">Alta Empleados</button></a>
                        <br>
                        <br>
                      @if(Session::has('mensajes'))
                        <div class='alert alert-success'>{{Session::get('mensajes')}}</div>
                      @endif

                      <div class="panel-body">

                        <div class="bs-example">
                            <div class="table-responsive">
                                <table class="table table-bordered">

                                            <thead>
                                            <tr>
                                            <th >Fotografia</th>
                                                <th >Clave</th>
                                                <th >Nombre</th>
                                                <th >Apellidos</th>
                                                <th >Correo</th>
                                                <th >Usuario</th>
                                                <th >Operaciones</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($consulta as $c)
                                            <tr>
                                               <td><img src = "{{asset('archivos/'. $c->img)}}" height =50 width=50> </td>

                                                <th >{{$c->Id_empleado}}</th>
                                                <td>{{$c->nombree}}</td>
                                                <td>{{$c->apellidoe}}</td>
                                                <td>{{$c->correo}}</td>
                                                <td>{{$c->usuario}}</td>



                                                <td>

                                                <a href="{{route('modificarempleados',['Id_empleado'=>$c->Id_empleado])}}">
                                                    <button type="button" class="btn btn-info">Modificación</button></a>
                                                    @if($c->deleted_at)
                                                    <a href="{{route('activarempleados',['Id_empleado'=>$c->Id_empleado])}}">
                                                        <button type="button" class="btn btn-warning">Activar</button>
                                                    </a>
                                                    <a href="{{route('borrarempleados',['Id_empleado'=>$c->Id_empleado])}}">
                                                        <button type="button" class="btn btn-secondary">Borrar</button></a>
                                                    @else
                                                    <a href="{{route('desactivarempleados',['Id_empleado'=>$c->Id_empleado])}}">
                                                        <button type="button" class="btn btn-danger">Desactivar</button></a>
                                                    @endif


                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                          <a href="{{ url('exportempleados') }}">
                                          <button type="button" class="btn btn-success">Imprimir .csv</button>
                                          </a>
                                    </div>
                      </div>
@stop
