<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDF Empleados</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--- CSS estilos--->
        <style></style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">PDF Empleados</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th >Clave</th>
                    <th>Fotografia</th>
                    <th >Nombre del Empleado</th>
                    <th >usuario</th>
                    <th >Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdfempleados as $c)
                        <tr>
                        <th >{{$c->Id_empleado}}</th>
                        <td><img src="{{asset('archivos/'. $c->img )}}" height=50 width=50></td>
                        <td>{{$c->nombree}} {{$c->apellidoe}}</td>
                        <td>{{$c->usuario}}</td>
                        <td>{{$c->correo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

</html>
