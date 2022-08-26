<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #etiqueta{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        <h1>Reporte Tisa</h1>
        <hr>
        <div class="contenido">
          <br><br>
          <img src="archivos/tisa.png" height="150" width="150">
           @foreach($pdfReporte as $c)
            <p id="etiqueta">
              <b>Número de reporte:</b>&nbsp;&nbsp;{{$c->id_reporte}}
              <br><br>
              <b>Fecha de inicio:</b>&nbsp;&nbsp;{{$c->fecha_inicio}}
              <br><br>
              <b>Fecha de finalización</b>:&nbsp;&nbsp;{{$c->fecha_fin}}
            </p>
            <p id="etiqueta">
              <b>Nombre del empleado:</b>&nbsp;&nbsp;{{$c->empleados}}
              <br><br>
              <b>Nombre del software:</b>&nbsp;&nbsp;{{$c->software}}
            </p>

            <p id="etiqueta"><b>Descripción:</b>&nbsp;&nbsp;{{$c->descripcion}}</p>
            <p id="etiqueta"><b>Revisión:</b>&nbsp;&nbsp;{{$c->revision}}</p>

            <p id="etiqueta">
              <b>Nombre del administrador:</b>&nbsp;&nbsp;{{$c->administradores}}
              <br><br>
              <b>Clave de asignación:</b>&nbsp;&nbsp; {{$c->asignaciones}}</p>
            <p id="etiqueta"><b>Observaciones:</b>&nbsp;&nbsp;{{$c->observaciones}}</p>
            <p id="etiqueta"><b>Estatus:</b>&nbsp;&nbsp;{{$c->estatus}}</p>
            @endforeach
        </div>
    </body>
</html>
