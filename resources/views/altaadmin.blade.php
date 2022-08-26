@extends('index')

@section('contenido')

<div class='panel-heading'>
  <i class='icon-edit icon-large'></i>
    Formulario de Administrador
</div>
  <div class='panel-body'>
    <fieldset>
      <form role="form" action = "{{route('guardaradmin')}}" method = "POST" enctype='multipart/form-data'>
        {{csrf_field()}}
          <div class="col-md-4">
            <label for="dni">Clave de Administrador:</label>
              @if($errors->first('clave'))
                <p class='text-danger'> {{$errors->first('clave')}}</p>
              @endif
              <input type="text" name="clave" id="clave" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="Clave administrador" tabindex="5">
          </div>
          <div class="col-md-4">
              <label  class="texto">Fotografia:  </label>
                  @if($errors->first('img'))
                    <p class='text-danger'> {{$errors->first('img')}}</p>
                  @endif
                  <input type="file" name="img" id="img" value="{{old('img')}}" class="form-control" tabindex="6">
          </div>
          <div class="col-md-4">
            <label>name de usuario:
                @if($errors->first('nusuario'))
                  <p class='text-danger'> {{$errors->first('nusuario')}}</p>
                @endif</label>
                <input type="text" name="nusuario" id="NombreUs" value="{{old('nusuario')}}" class="form-control" placeholder="Ejemplo: JuanRQ1516">
           </div>
           <div class="col-md-4">
              <label>Nombre:</label>
                @if($errors->first('name'))
                  <p class='text-danger'> {{$errors->first('name')}}</p>
                @endif
                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Ejemplo: Juan">
            </div>
            <div class="col-md-4  ">
              <label>Apellido Paterno:</label>
                  @if($errors->first('app'))
                    <p class='text-danger'> {{$errors->first('app')}}</p>
                  @endif
                  <input type="text" name="app" id="App" value="{{old('app')}}" class="form-control" placeholder="Ejemplo: Rosales">
            </div>
            <div class="col-md-4">
              <label>Apellido Materno:
                  @if($errors->first('apm'))
                    <p class='text-danger'> {{$errors->first('apm')}}</p>
                  @endif</label>
                  <input type="text" name="apm" id="Apm" value="{{old('apm')}}" class="form-control" placeholder="Ejemplo: Quiroz">
            </div>
            <div class="col-md-3">
              <label>Correo Electronico:</label>
                @if($errors->first('email'))
                  <p class='text-danger'> {{$errors->first('email')}}</p>
                @endif
                <input  type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Ejemplo:Juan@gmail.com">
            </div>
            <div class="col-md-3 form-group">
              <label>Contraseña:</label>
                @if($errors->first('password'))
                  <p class='text-danger'> {{$errors->first('password')}}</p>
                @endif
                <input  type="passwordword" name="password" id="password"  class="form-control" placeholder="Contraseña">
            </div>
          <div class="col-md-3">
            <label>Tipo de Usuario:</label>
             <select class="form-control" name="tipoad" id="tipoad" value="{{old('tipoad')}}">
                 <option value="admin1">Administrador</option>
                 <option value="admin2">Empleado</option>
              </select>
          </div>

            <div class=" col-md-8">
              <br>
                <div class="col-md-4">
                  <button class="btn btn-success btn-block" >Guardar</button>
                </div>
                <div class="col-md-4">
                  <button  class="btn btn-danger btn-block">Cancelar</button>
                </div>
            </div>
        </fieldset>
  </form>
  </div>
@stop
