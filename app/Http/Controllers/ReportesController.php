<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportes;
use App\Models\User;
use App\Models\Empleados;
use App\Models\Software;
use App\Models\Asignaciones;
use Session;
use PDF;

class ReportesController extends Controller
{
  public function Reportes(){
    $sessionid = session('sessionid');
    $sessiontipoad = session('sessiontipoad');
    if($sessionid =='' or $sessiontipoad =='')
    {

        Session::flash('mensaje', "Debes Iniciar Sesion primero");
            return redirect()->route('login');


        }
        else{
                $consulta = reportes::orderBy('id_reporte','DESC')
                                            ->take(1)->get();
                $cuantos = count($consulta);
                if($cuantos==0)
                {
                    $idsigue = 1;
                }
                else{
                    $idsigue = $consulta[0]->id_reporte + 1;
                }

                $user = user::all();
                $empleados = Empleados::all();
                $software = Software::all();
                $asignaciones = Asignaciones::all();
                return view ('Reportes')
                ->with('idsigue', $idsigue)
                ->with('user',$user)
                ->with('empleados',$empleados)
                ->with('asignaciones',$asignaciones)
                ->with('software',$software);
            }
        }

 public function GuardarReportes(Request $request)
 {
     $id_reporte = $request->id_reporte;
     $fecha_inicio = $request->fecha_inicio;
     $fecha_fin = $request->fecha_fin;
     $Id_empleado = $request->Id_empleado;
     $id_software = $request->id_software;
     $descripcion = $request->descripcion;
     $revision = $request->revision;
     $id = $request->id;
     $id_asignacion = $request->id_asignacion;
     $observaciones = $request->observaciones;
     $estatus = $request->estatus;

     $this->validate($request,[
         'id_reporte'=>'required|integer',
         'fecha_inicio'=>'required',
         'fecha_fin'=>'required',
         'Id_empleado'=>'required',
         'id_software'=>'required',
         'descripcion'=>'required',
         'revision'=>'required',
         'id'=>'required',
         'id_asignacion'=>'required',
         'observaciones'=>'required',
         'estatus'=>'required'
     ]);

     $reportes= new reportes();
         $reportes->id_reporte=$request->id_reporte;
         $reportes->fecha_inicio=$request->fecha_inicio;
         $reportes->fecha_fin=$request->fecha_fin;
         $reportes->Id_empleado=$request->Id_empleado;
         $reportes->id_software=$request->id_software;
         $reportes->descripcion=$request->descripcion;
         $reportes->revision=$request->revision;
         $reportes->id=$request->id;
         $reportes->id_asignacion=$request->id_asignacion;
         $reportes->observaciones=$request->observaciones;
         $reportes->estatus=$request->estatus;
         $reportes->save();

    Session::flash('mensaje',"El reporte ha sido creado correctamente");
     return redirect('ConsultarReportes');

     //return $request;
     //echo"Datos guardados";

  }

  public function ConsultarReportes(){
    $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta=reportes::withTrashed()->join('users','reportes.id','=','users.id')
                ->join('empleados','reportes.Id_empleado','=','empleados.Id_empleado')
                ->join('software','reportes.id_software','=','software.id_software')
                ->join('asignaciones','reportes.id_asignacion','=','asignaciones.id_asignacion')
                ->select('reportes.id_reporte','reportes.fecha_inicio','reportes.fecha_fin','reportes.descripcion','reportes.revision',
                'reportes.observaciones','reportes.estatus','users.name as users','empleados.nombree as empleados',
                'software.nombre as software','asignaciones.pruebas as asignaciones','reportes.deleted_at')
                ->orderby('reportes.id_reporte')
                ->get();
                return view ('ConsultarReportes')
                ->with('consulta',$consulta);

            }

        }
  public function ModificarReportes($id){
    $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta = reportes::where('id_reporte','=',$id)
                            ->get();
                $admin = user::where('id','=',$consulta[0]->id)
                            ->get();
                $nomadmin =$admin[0]->name;
                $user = user::where('id','!=',$consulta[0]->id)
                            ->get();
                $emp = empleados::where('Id_empleado','=',$consulta[0]->Id_empleado)
                            ->get();
                $nomemp =$emp[0]->nombree;
                $empleados = empleados::where('Id_empleado','!=',$consulta[0]->Id_empleado)
                            ->get();
                $sof = software::where('id_software','=',$consulta[0]->id_software)
                            ->get();
                $nomsof=$sof[0]->nombre;
                $software = software::where('id_software','!=',$consulta[0]->id_software)
                            ->get();
                $asig = asignaciones::where('id_asignacion','=',$consulta[0]->id_asignacion)
                            ->get();
                $asign=$asig[0]->pruebas;
                $asignaciones = asignaciones::where('id_asignacion','!=',$consulta[0]->id_asignacion)
                            ->get();
                return view('EditarReportes')
                ->with('consulta',$consulta[0])
                ->with('user',$user)
                ->with('id',$consulta[0]->id)
                ->with('nomadmin',$nomadmin)
                ->with('empleados',$empleados)
                ->with('Id_empleado',$consulta[0]->Id_empleado)
                ->with('nomemp',$nomemp)
                ->with('asignaciones',$asignaciones)
                ->with('id_asignacion',$consulta[0]->id_asignacion)
                ->with('asign',$asign)
                ->with('software',$software)
                ->with('id_software',$consulta[0]->id_software)
                ->with('nomsof',$nomsof);

            }
        }

  public function EditarReportes(Request $request, $id){

      $validacion = $request->validate([
        'id_reporte'=>'required',
        'fecha_inicio'=>'required',
        'fecha_fin'=>'required',
        'Id_empleado'=>'required',
        'id_software'=>'required',
        'descripcion'=>'required',
        'revision'=>'required',
        'id'=>'required',
        'id_asignacion'=>'required',
        'observaciones'=>'required',
        'estatus'=>'required'
    ]);
    reportes::where('id_reporte', $id)->update($validacion);
    Session::flash('mensaje',"Ha sido modificado correctamente");
    return redirect('ConsultarReportes');

 }

 public function BorrarReporte($id_reporte)
 {
     $consulta = reportes::withTrashed()->find($id_reporte)->forceDelete();

     Session::flash('mensaje','El reporte ha sido BORRADO PERMANENTEMENTE');
     return redirect()->route('ConsultarReportes');

 }

 public function pdfReporte($id_reporte){
   //return $id_reporte;
     //$pdfasig = Asignaciones::all();
     $pdfReporte=reportes::withTrashed()->join('users','reportes.id','=','users.id')
     ->join('empleados','reportes.Id_empleado','=','empleados.Id_empleado')
     ->join('software','reportes.id_software','=','software.id_software')
     ->join('asignaciones','reportes.id_asignacion','=','asignaciones.id_asignacion')
     ->select('reportes.id_reporte','reportes.fecha_inicio','reportes.fecha_fin','reportes.descripcion','reportes.revision',
     'reportes.observaciones','reportes.estatus','users.name as users','empleados.nombree as empleados',
     'software.nombre as software','asignaciones.pruebas as asignaciones','reportes.deleted_at')
     ->where ('reportes.id_reporte','=',$id_reporte)
     ->orderby('reportes.id_reporte')
     ->get();
     //return $pdfReporte;
     $pdf = PDF::loadView('pdfReporte', compact('pdfReporte'));
     return $pdf->download('pdf_reporte.pdf');
 }



}
