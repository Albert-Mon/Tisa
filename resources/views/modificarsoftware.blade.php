@extends('index')

@section('contenido')


                    <div class='panel-heading'>
                        <i class='icon-edit icon-large'></i>
                         Modificación de Software
                    </div>
                    <div class='panel-body'>
                        <fieldset>


                        <form role="form" action = "{{route('cambiarsoftware')}}" method = "POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="col-md-4 form-group">
                            <label for="dni">Clave de Software:
                              @if($errors->first('id_software'))
                              <p class='text-danger'> {{$errors->first('id_software')}}</p>
                              @endif
                            </label>
                            <input type="text" name="id_software" id="idAdmin" value="{{$consulta->id_software}}" readonly='readonly' class="form-control" placeholder="Clave Software" tabindex="5">
                         </div>



                         <div class="col-md-4  form-group">
                            <label>Nombre de Software:
                            @if($errors->first('nombre'))
                              <p class='text-danger'> {{$errors->first('nombre')}}</p>
                              @endif</label>
                            <input type="text" name="nombre" id="NombreUs" value="{{$consulta->nombre}}" class="form-control" placeholder="Ejemplo: Softdaletes">
                          </div>

                          <div class="col-md-4  form-group">
                            <label>Descripcion:
                            @if($errors->first('descripcion'))
                              <p class='text-danger'> {{$errors->first('descripcion')}}</p>
                              @endif</label>
                            <input type="text" name="descripcion" id="descripcion" value="{{$consulta->descripcion}}" class="form-control" placeholder="Agregue una descripcion">
                          </div>

                          <div class="col-md-4">
                              <label>Nombre de la Empleado: </label>
                              <select class="form-control" name="Id_empleado">
                                  <option value  ='{{$Id_empleado}}'>{{$nomemp}}</option>
                              @foreach($empleados as $empleado)
                                  <option value  ='{{$empleado->Id_empleado}}'>{{$empleado->nombree}}</option>
                              @endforeach
                              </select>
                          </div>

                          <div class="col-md-4">
                            <label>Pruebas:
                            @if($errors->first('pruebas'))
                              <p class='text-danger'> {{$errors->first('pruebas')}}</p>
                              @endif</label>
                            <input type="text" name="pruebas" id="pruebas" value="{{$consulta->pruebas}}" class="form-control" placeholder="Ejemplo: Funcionamiento de Botones">
                          </div>

                          <div class="col-md-4 form-group">
                            <label for="tel">Fecha Inicio:
                                @if ($errors->first('fecha_inicio'))
                                <p class='text-danger'>{{$errors->first('fecha_inicio')}}</p>
                                @endif
                            </label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{$consulta->fecha_inicio}}" class="form-control">
                            </div>

                            <div class="col-md-4 form-group">
                            <label for="tel">Fecha Fin:
                                @if ($errors->first('fecha_fin'))
                                <p class='text-danger'>{{$errors->first('fecha_fin')}}</p>
                                @endif
                            </label>
                                <input type="date" name="fecha_fin" id="fecha_fin" value="{{$consulta->fecha_fin}}" class="form-control">
                            </div>

                          <div class="col-md-12">

                          <div class="row">

                          <div class=" col-md-6 form-group">

                          <div class="row">
                            <div class="col-md-3"><input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="7"
                                title="Guardar datos ingresados">
                            </div>

                              <div class="col-md-3">
                                <button  class="btn btn-danger btn-block btn-lg">Cancelar</button>
                              </div>

                              <div class="col-md-3">
                                <a href="{{route('reportesoftware')}}"> <button type="button" class="btn btn-success">Reporte Software</button></a>
                              </div>

                              </div>

</div>
</fieldset>
</div>

</form>
</div>

</div>
</div>


</div>
@stop
