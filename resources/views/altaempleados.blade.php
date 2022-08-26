@extends('index')
@section('contenido')

<div class='panel-heading'>
  <i class='icon-edit icon-large'></i>
    Alta de Empleados
</div>
  <div class='panel-body'>
    <form action ="{{route('guardarempleados')}}" method ="POST" enctype='multipart/form-data'>
      {{csrf_field()}}
        <div class="col-md-2">
          <label>Clave de Empleado:
            @if($errors->first('Id_empleado'))
              <p class='text-danger'> {{$errors->first('Id_empleado')}}</p>
            @endif
          </label>
            <input type="text" name="Id_empleado" id="idemple" value="{{$idsigue}}" readonly='readonly' class="form-control"tabindex="5">
        </div>
        <div class="col-md-6">
          <label>Nombre del Empleado:
            @if($errors->first('nombree'))
              <p class='text-danger'>{{$errors->first ('nombree')}}</nombree>
            @endif
          </label>
              <input type="text" class="form-control" placeholder="Ejem: Juan Carlos" name="nombree" id="nombree" value="{{old('nombree')}}">
        </div>
        <div class="col-md-6 ">
          <label>Apellidos:
            @if($errors->first('apellidoe'))
              <p class='text-danger'>{{$errors->first ('apellidoe')}}</apellidoe>
            @endif
          </label>
            <input type="text" class="form-control" placeholder="Ejem: De la Cruz"name="apellidoe" id="apellidoe" value="{{old('apellidoe')}}">
        </div>
        <div class="col-md-4 form-group">
          <label>Correo Electronico:</label>
            @if($errors->first('correo'))
              <p class='text-danger'>{{$errors->first ('correo')}}</correo>
            @endif
            <input class="form-control" placeholder="Ejemplo:Juan@gmail.com"  name="correo" id="correo" value="{{old('correo')}}" >
        </div>
        <div class="col-md-4">
          <label>Fotografia:</label>
            @if($errors->first('img'))
              <p class='text-danger'>{{$errors->first ('img')}}</img>
            @endif
          </label>
              <input type="file" class="form-control" name="img" id="img" value="img" tabindex="6">
        </div>
        <div class="col-md-4">
          <label>Nombre de Usuario:</label>
            @if($errors->first('usuario'))
              <p class='text-danger'>{{$errors->first ('usuario')}}</usuario>
            @endif
            <input type="text" class="form-control" placeholder="JuCrz88" name="usuario" id="usuario" value="{{old('usuario')}}">
        </div>
        <div class="col-md-4">
            <label>Contraseña:</label>
                @if($errors->first('contra'))
                  <p class='text-danger'>{{$errors->first ('contra')}}</contra>
                @endif
                <input type="text" class="form-control" name="contra" id="contra" value="{{old('contra')}}">
        </div>
        <center>
          <div class=" col-md-8">
            <br>
              <div class="col-md-4">
                <button class="btn btn-success btn-block" >Guardar</button>
              </div>
              <div class="col-md-4">
                <button  class="btn btn-danger btn-block">Cancelar</button>
              </div>
          </div>
        </center>
  </form>
</div>
@stop
