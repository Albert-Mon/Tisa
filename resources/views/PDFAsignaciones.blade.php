<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Asignaciones</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--- CSS estilos--->
        <style></style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">PDF Asignaciones</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th >Clave</th>
                    <th>Software</th>
                    <th >Nombre del Administrador</th>
                    <th >Nombre del Empleado</th>
                    <th >Fecha</th>
                    <th >Pruebas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdfasig as $c)
                        <tr>
                        <th >{{$c->id_asignacion}}</th>
                        <td>{{$c->software}}</td>
                        <td>{{$c->administradores}}</td>
                        <td>{{$c->empleados}}</td>
                        <td>{{$c->fecha_entrega}}</td>
                        <td>{{$c->pruebas}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

</html>
