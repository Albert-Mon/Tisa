<table>
    <thead>
        <tr>
            <th style="font-size: 12px; font-weight:bold; color:#02AC66; text-align:center;">id_software</th>
            <th >Nombre de Software</th>
            <th >Descripcion</th>
            <th >Id_empleado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($software as $softwer))
        <tr>
            <th >{{$softwer->id_software}}</th>
            <td>{{$softwer->nombre}}</td>
            <td>{{$softwer->descripcion}}</td>
            <td>{{$softwer->empleados}}</td>
            <td>{{$softwer->pruebas}}</td>
            <td>{{$softwer->fecha_inicio}}</td>
            <td>{{$softwer->fecha_fin}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
