@extends('index')

@section('contenido')
<div class="panel panel-warning">
                      <div class="panel-heading">
                        <h3 class="panel-title">Registro de Paqueteria</h3>
                      </div>
                      <div class="panel-body">

<form action ="{{route('cambiarempleados')}}" method ="POST" enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="col-md-2 form-group">
                            <label for="dni">Clave del Empleado:
                              @if($errors->first('Id_empleado'))
                              <p class='text-danger'> {{$errors->first('Id_empleado')}}</p>
                              @endif
                            </label>
                            <input type="text" name="Id_empleado" id="idemple" value="{{$consulta->Id_empleado}}" readonly='readonly' class="form-control"tabindex="5">
                         </div>

                          <div class="col-md-6">
                            <label>Nombre del Empleado:
                            @if($errors->first('nombree'))
                            <p class='text-danger'>{{$errors->first ('nombree')}}</nombree>
                            @endif
                            </label>
                            <input type="text" class="form-control" name="nombree" id="nomree" value="{{$consulta->nombree}}">
                          </div>
                          <div class="col-md-6 ">
                            <label>Apellidos:
                            @if($errors->first('apellidoe'))
                            <p class='text-danger'>{{$errors->first ('apellidoe')}}</apellidoe>
                            @endif
                            </label>
                            <input type="text" class="form-control"name="apellidoe" id="apellidoe" value="{{$consulta->apellidoe}}">
                          </div>

                          <div class="col-md-4 form-group">
                          <label  class="texto">Fotografia:
                              <img src="{{asset('archivos/'. $consulta->img )}}" height=150 width=150>
                              @if($errors->first('img'))
                              <p class='text-danger'> {{$errors->first('img')}}</p>
                              @endif
                            </label>
                                <input type="file" name="img" id="img" value="{{old('img')}}" class="form-control" tabindex="6">
                          </div>
                          <br>

                            <div class="col-md-8 form-group">
                              <label>Correo Electronico:
                              @if($errors->first('correo'))
                            <p class='text-danger'>{{$errors->first ('correo')}}</correo>
                            @endif
                              </label>
                              <input class="form-control"   name="correo" id="correo" value="{{$consulta->correo}}" >
                            </div>
                            <br>
                            <div class="col-md-3">
                            <label>Usuario:
                            @if($errors->first('usuario'))
                            <p class='text-danger'>{{$errors->first ('usuario')}}</usuario>
                            @endif
                            </label>
                            <input type="text" class="form-control" placeholder="Ejem: Zacatlan"name="usuario" id="usuario" value="{{$consulta->usuario}}">
                          </div>
                           <div class="col-md-6">
                            <label>Contraseña:
                            @if($errors->first('contra'))
                            <p class='text-danger'>{{$errors->first ('contra')}}</contra>
                            @endif
                            </label>
                            <input type="text" class="form-control" placeholder="Ejem: Independencia" name="contra" id="contra" value="{{$consulta->contra}}">
                          </div>




                          <div class=" col-md-4 form-group">
                          <br>
                          <div class="col-md-6">
                            <button class="btn btn-success btn-block">Guardar</button>
                          </div>
                          <div class="col-md-6">
                            <button  class="btn btn-danger btn-block">Cancelar</button>
                          </div>
                          </div>
                          </div>
                          </div>

                        </form>







@stop
