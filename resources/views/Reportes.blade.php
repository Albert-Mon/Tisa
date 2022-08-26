@extends('index')
@section('contenido')

  <div class='panel-heading'>
    <i class='icon-edit icon-large'></i>
    Alta de Reportes
  </div>
  <div class='panel-body'>
    <form action="{{route('GuardarReportes')}}" method="POST" enctype='multipart/form-data'>
    {{csrf_field()}}
      <div class="col-md-4">
        <label for="id_asignacion">Clave: </label>
        @if($errors->first('id_reporte'))
          <p class='text-danger'>{{$errors->first('id_reporte')}}</p>
        @endif
          <input type="text" name="id_reporte" id="id_reporte" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="">
      </div>
      <div class="col-md-3">
        <label for="tel">Fecha de inicio</label>
        @if($errors->first('fecha_inicio'))
          <p class='text-danger'>{{$errors->first('fecha_inicio')}}</p>
        @endif
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{old('fecha_inicio')}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
              <label for="tel">Fecha de termino</label>
              @if($errors->first('fecha_fin'))
          <p class='text-danger'>{{$errors->first('fecha_fin')}}</p>
          @endif
                  <input type="date" name="fecha_fin" id="fecha_fin" value="{{old('fecha_fin')}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-4">
        <label>Nombre del empleado: </label>
          <select class="form-control" name="Id_empleado">
            @foreach($empleados as $empleado)
              <option value  ='{{$empleado->Id_empleado}}'>{{$empleado->nombree}}</option>
            @endforeach
          </select>
      </div>
      <div class="col-md-4">
        <label>Nombre del software: </label>
          <select class="form-control" name="id_software">
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
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
        <label for="tel">Revisión</label>
          @if($errors->first('revision'))
            <p class='text-danger'>{{$errors->first('revision')}}</p>
          @endif
            <input type="text" name="revision" id="revision" value="{{old('revision')}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-4">
        <label>Nombre del administrador: </label>
          <select class="form-control" name="id">
          @foreach($user as $user)
            <option value  ='{{$user->id}}'>{{$user->name}}</option>
          @endforeach
          </select>
      </div>
      <div class="col-md-4">
        <label>Asignacion: </label>
          <select class="form-control" name="id_asignacion">
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
            <input type="text" name="observaciones" id="observaciones" value="{{old('observaciones')}}" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3">
        <label>Estatus:</label>
          <select class="form-control" name="estatus" id="estatus" value="{{old('estatus')}}">
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
