@extends('index')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Reportes Administradores</h3>
    </div>
    <div class='panel-body'>
      <fieldset>
      <br>
      <a href="{{route('altaadmin')}}"> <button type="button" class="btn btn-success">Alta Administrador</button></a>
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
                <th>Fotografia</th>
                <th >Nombre de Usuario</th>
                <th >Nombre Completo</th>
                <th >Correo</th>
                <th >Operaciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($consulta as $c)
              <tr>
                <th >{{$c->id}}</th>
                <td><img src="{{asset('archivos/'. $c->img )}}" height=50 width=50></td>
                <td>{{$c->nusuario}}</td>
                <td>{{$c->name}} {{$c->app}} {{$c->apm}}</td>
                <td>{{$c->email}}</td>
                <td>
                <a href="{{route('modificaradmin',['id'=>$c->id])}}">
                <button type="button" class="btn btn-info">Modificación</button></a>
                @if(Session::get('sessiontipoad')=="admin2")
                @if($c->deleted_at)             <!--si la consulta c el campo deleted tiene info manda a llamar un campo activar -->
                  <a href="{{route('activaradmin',['id'=>$c->id])}}">    <!-- -->
                    <button type="button" class="btn btn-warning">Activar</button></a>
                  <a href="{{route('borraradmin',['id'=>$c->id])}}">
                    <button type="button" class="btn btn-secondary">Borrar</button></a>
                @else                               <!-- en dado caso que este vacio que llame a dasactivar -->
                  <a href="{{route('desactivaradmin',['id'=>$c->id])}}">
                    <button type="button" class="btn btn-danger">Desactivar</button></a>
                @endif
                @endif
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>


                                    </div>
                      </div>
                    </div>
                </fieldset>

@stop
