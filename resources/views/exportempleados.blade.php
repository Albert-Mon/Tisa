<h2 class="mb-4">REPORTE DE EMPLEADOS REGISTRADOS</h2>
<table>
    <thead>
        <tr>
            <th >Clave</th>
                    <th >Nombre del Empleado</th>
                    <th >usuario</th>
                    <th >Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Empleados as $emple)
        <tr>
        <th >{{$emple->Id_empleado}}</th>
                        <td>{{$emple->nombree}} {{$emple->apellidoe}}</td>
                        <td>{{$emple->usuario}}</td>
                        <td>{{$emple->correo}}</td>
        </tr>
        @endforeach
    </tbody>
</table>