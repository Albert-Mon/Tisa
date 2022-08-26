<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Software</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--- CSS estilos--->
        <style></style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">PDF Software</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th >Id</th>
                    <th >Nombre</th>
                    <th >Descripcion</th>
                    <th >Nombre Empleado</th>
                    <th >Pruebas</th>
                    <th >Fecha de Inicio</th>
                    <th >Fecha de Fin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdfsoftware as $c)
                        <tr>
                        <th >{{$c->id_software}}</th>
                        <td>{{$c->nombre}}</td>
                        <td>{{$c->descripcion}}</td>
                        <td>{{$c->Id_empleado}}</td>
                        <td>{{$c->pruebas}}</td>
                        <td>{{$c->fecha_inicio}}</td>
                        <td>{{$c->fecha_fin}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

</html>
