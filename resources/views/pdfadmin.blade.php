<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Administradores</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--- CSS estilos--->
        <style></style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">PDF Administradores</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th >Clave</th>
                    <th>Foto/Imagen</th>
                    <th >Nombre de Usuario</th>
                    <th >Nombre Completo</th>
                    <th >Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdfadmin as $c)
                        <tr>
                        <th >{{$c->clave}}</th>
                        <td><img src="{{asset('archivos/'. $c->img )}}" height=50 width=50></td>
                        <td>{{$c->nusuario}}</td>
                        <td>{{$c->nombre}} {{$c->app}} {{$c->apm}}</td>
                        <td>{{$c->correo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

</html>
