@extends('index')
@section('contenido')

<div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
            Form Default
          </div>
          <div class='panel-body'>
            <form action="{{route('EditarAsignaciones',$consulta->id_asignacion)}}" method="POST" enctype='multipart/form-data'>

                {{csrf_field()}}

                <div class="col-md-4">
            <label for="id_asignacion">Clave: </label>
                @if($errors->first('id_asignacion'))
                <p class='text-danger'>{{$errors->first('id_asignacion')}}</p>
                @endif
                <input type="text" name="id_asignacion" id="id_asignacion" value="{{$consulta->id_asignacion}}"readonly='readonly' class="form-control" placeholder="">
        </div>

        <div class="col-md-4">
            <label>Nombre de la Software: </label>
            <select class="form-control" name="id_software">
                <option value  ='{{$id_software}}'>{{$nomsof}}</option>
            @foreach($software as $software)
                <option value  ='{{$software->id_software}}'>{{$software->nombre}}</option>
            @endforeach
            </select>
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
            <label>Nombre del Administrador: </label>
            <select class="form-control" name="id">
                <option value  ='{{$id}}'>{{$nomadmin}}</option>
            @foreach($user as $user)
                <option value  ='{{$user->id}}'>{{$user->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="col-md-3">
                <label for="tel">Fecha de entrega</label>
                @if($errors->first('fecha_entrega'))
            <p class='text-danger'>{{$errors->first('fecha_entrega')}}</p>
            @endif
                    <input type="date" name="fecha_entrega" id="fecha_entrega" value="{{$consulta->fecha_entrega}}" class="form-control" placeholder="Fecha">
        </div>
        <div class="col-md-3">
          <label>Tipo de pruebas:</label>
           <select class="form-control" name="pruebas" id="pruebas" value="{{$consulta->pruebas}}">
               <option value="Pruebas Unitarias">Pruebas Unitarias</option>
               <option value="Pruebas de Integraci??n">Pruebas de Integraci??n</option>
               <option value="Pruebas Funcionales">Pruebas Funcionales</option>
               <option value="Pruebas de Punta a Punta">Pruebas de Punta a Punta</option>
               <option value="Pruebas de Regresi??n">Pruebas de Regresi??n</option>
               <option value="Pruebas de Humo ">Pruebas de Humo</option>
               <option value="Pruebas de Aceptaci??n">Pruebas de Aceptaci??n</option>
               <option value="Pruebas de Rendimiento">Pruebas de Rendimiento</option>
            </select>
        </div>
        <br><br>
         <div class="row">
                <div class="col-md-3">
                    <input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="7" title="Guardar datos ingresados">
                </div>
                <div class="col-md-3">
                    <button  class="btn btn-danger btn-block btn-lg">Cancelar</button>
                </div>
        </div>
            </form>
          </div>

@stop
