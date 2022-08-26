@extends('index')
@section('contenido')

  <div class='panel-heading'>
    <i class='icon-edit icon-large'></i>
    Alta de Reportes
  </div>
  <div class='panel-body'>
    <form action="{{route('EditarReportes',$consulta->id_reporte)}}" method="POST" enctype='multipart/form-data'>
    {{csrf_field()}}
      <div class="col-md-4">
        <label for="id_asignacion">Clave: </label>
        @if($errors->first('id_reporte'))
          <p class='text-danger'>{{$errors->first('id_reporte')}}</p>
        @endif
          <input type="text" name="id_reporte" id="id_reporte" value="{{$consulta->id_reporte}}" readonly='readonly' class="form-control" placeholder="">
      </div>
      <div class="col-md-3">
        <label for="tel">Fecha de inicio</label>
        @if($errors->first('fecha_inicio'))
          <p class='text-danger'>{{$errors->first('fecha_inicio')}}</p>
        @endif
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{$consulta->fecha_inicio}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
              <label for="tel">Fecha de termino</label>
              @if($errors->first('fecha_fin'))
          <p class='text-danger'>{{$errors->first('fecha_fin')}}</p>
          @endif
                  <input type="date" name="fecha_fin" id="fecha_fin" value="{{$consulta->fecha_fin}}" class="form-control" placeholder="Fecha">
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
          <label>Nombre de la Software: </label>
          <select class="form-control" name="id_software">
              <option value  ='{{$id_software}}'>{{$nomsof}}</option>
          @foreach($software as $software)
              <option value  ='{{$software->id_software}}'>{{$software->nombre}}</option>
          @endforeach
          </select>
      </div>
      <div class="col-md-3">
        <label for="tel">Descripción</label>
          @if($errors->first('descripcion'))
            <p class='text-danger'>{{$errors->first('descripcion')}}</p>
          @endif
            <input type="text" name="descripcion" id="descripcion" value="{{$consulta->descripcion}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
        <label for="tel">Revisión</label>
          @if($errors->first('revision'))
            <p class='text-danger'>{{$errors->first('revision')}}</p>
          @endif
            <input type="text" name="revision" id="revision" value="{{$consulta->revision}}" class="form-control" placeholder="Fecha">
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
      <div class="col-md-4">
          <label>Asignación: </label>
          <select class="form-control" name="id_asignacion">
              <option value  ='{{$id_asignacion}}'>{{$asign}}</option>
          @foreach($asignaciones as $asignacion)
              <option value  ='{{$asignacion->id_asignacion}}'>{{$asignacion->pruebas}}</option>
          @endforeach
          </select>
      </div>
      <div class="col-md-3">
        <label for="tel">Observaciones:</label>
          @if($errors->first('observaciones'))
            <p class='text-danger'>{{$errors->first('observaciones')}}</p>
          @endif
            <input type="text" name="observaciones" id="observaciones" value="{{$consulta->observaciones}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
        <label>Estatus:</label>
          <select class="form-control" name="estatus" id="estatus" value="{{$consulta->estatus}}">
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Iniciado">Iniciado</option>
          </select>
      </div>

      <div class="row">
        <div class="col-md-3">
          <input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="7" title="Guardar datos ingresados">
        </div>
          <div class="col-md-3">
            <button  class="btn btn-danger btn-block btn-lg">Cancelar</button>
          </div>
      </div>
    </form>
  </div> <!-- </div> body -->

@stop
