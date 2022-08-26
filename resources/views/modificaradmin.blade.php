@extends('index')

@section('contenido')


<div id='content'>
                    <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <i class='icon-edit icon-large'></i>
                         Modificación de Administrador
                    </div>
                    <div class='panel-body'>
                        <fieldset>


                        <form role="form" action = "{{route('cambiaradmin')}}" method = "POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="col-md-4 form-group">
                            <label for="dni">Clave de Administrador:
                              @if($errors->first('id'))
                              <p class='text-danger'> {{$errors->first('id')}}</p>
                              @endif
                            </label>
                            <input type="text" name="id" id="idAdmin" value="{{$consulta->id}}" readonly='readonly' class="form-control" placeholder="Clave administrador" tabindex="5">
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


                         <div class="col-md-4  form-group">
                            <label>Nombre de usuario:
                            @if($errors->first('nusuario'))
                              <p class='text-danger'> {{$errors->first('nusuario')}}</p>
                              @endif</label>
                            <input type="text" name="nusuario" id="NombreUs" value="{{$consulta->nusuario}}" class="form-control" placeholder="Ejemplo: JuanRQ1516">
                          </div>

                          <div class="col-md-4  form-group">
                            <label>Nombre(s):
                            @if($errors->first('name'))
                              <p class='text-danger'> {{$errors->first('name')}}</p>
                              @endif</label>
                            <input type="text" name="name" id="name" value="{{$consulta->name}}" class="form-control" placeholder="Ejemplo: Juan">
                          </div>

                          <div class="col-md-4  ">
                            <label>Apellido Paterno:
                            @if($errors->first('app'))
                              <p class='text-danger'> {{$errors->first('app')}}</p>
                              @endif</label>
                            <input type="text" name="app" id="App" value="{{$consulta->app}}" class="form-control" placeholder="Ejemplo: Rosales">
                          </div>

                          <div class="col-md-4">
                            <label>Apellido Materno:
                            @if($errors->first('apm'))
                              <p class='text-danger'> {{$errors->first('apm')}}</p>
                              @endif</label>
                            <input type="text" name="apm" id="Apm" value="{{$consulta->apm}}" class="form-control" placeholder="Ejemplo: Quiroz">
                          </div>

                          <div class="col-md-12">

                          <div class="row">

                            <div class="col-md-3 form-group">
                              <label>Correo Electronico:
                              @if($errors->first('email'))
                              <p class='text-danger'> {{$errors->first('email')}}</p>
                              @endif</label>
                              <input  type="email" name="email" id="email" value="{{$consulta->email}}" class="form-control" placeholder="Ejemplo:Juan@gmail.com">
                            </div>

                            <div class="col-md-3 form-group">
                              <label>Contraseña:
                              @if($errors->first('password'))
                              <p class='text-danger'> {{$errors->first('password')}}</p>
                              @endif</label>
                              <input  type="password" name="password" id="password" value="{{$consulta->password}}"  class="form-control" placeholder="Contraseña">
                            </div>
                             <div class="col-md-3">
                               <label>Tipo de Usuario:</label>
                                <select class="form-control" name="tipoad" id="tipoad" value="{{$consulta->tipoad}}" >
                                    <option value="admin1">Administrador</option>
                                    <option value="admin2">Empleado</option>
                                 </select>
                             </div>

                          <div class=" col-md-6 form-group">

                          <div class="row">
                            <div class="col-md-3"><input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="7"
                                title="Guardar datos ingresados">
                            </div>

                              <div class="col-md-3">
                                <button  class="btn btn-danger btn-block btn-lg">Cancelar</button>
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
