<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Asignaciones;

class AsignacionesExport implements FromView, ShouldAutoSize
{
  use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
      public function view(): View
      {
          return view('ExportAsignaciones', ['asignaciones' => Asignaciones::join('administradores','asignaciones.clave','=','administradores.clave')
          ->join('empleados','asignaciones.Id_empleado','=','empleados.Id_empleado')
          ->join('software','asignaciones.id_software','=','software.id_software')
          ->select('asignaciones.fecha_entrega','asignaciones.id_asignacion','administradores.nombre as administradores','asignaciones.pruebas','empleados.nombree as empleados',
          'software.nombre as software')
          ->orderby('asignaciones.id_asignacion')
          ->get()]);
      }
}
