<table>
    <thead>
        <tr>
            <th style="font-size: 12px; font-weight:bold; color:#02AC66; text-align:center;">Clave</th>
            <th >Nombre de Usuario</th>
            <th >Nombre Completo</th>
            <th >Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($administradores as $administrador))
        <tr>
            <th >{{$administrador->clave}}</th>
            <td>{{$administrador->nusuario}}</td>
            <td>{{$administrador->nombre}} {{$administrador->app}} {{$administrador->apm}}</td>
            <td>{{$administrador->correo}}</td>
        </tr>
        @endforeach
    </tbody>
</table>