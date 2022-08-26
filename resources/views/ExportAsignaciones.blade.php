<table>
    <thead>
        <tr>
            <th style="font-size: 12px; font-weight:bold; color:#02AC66; text-align:center;">Clave</th>
        <th >Clave</th>
        <th>Software</th>
        <th >Nombre del Administrador</th>
        <th >Nombre del Empleado</th>
        <th >Fecha</th>
        <th >Pruebas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asignaciones as $asignaciones))
        <tr>
        <th >{{$asignaciones->id_asignacion}}</th>
        <td>{{$asignaciones->software}}</td>
        <td>{{$asignaciones->administradores}}</td>
        <td>{{$asignaciones->empleados}}</td>
        <td>{{$asignaciones->fecha_entrega}}</td>
        <td>{{$asignaciones->pruebas}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
