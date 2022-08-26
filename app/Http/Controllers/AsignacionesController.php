<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empleados;
use App\Models\Software;
use App\Models\Asignaciones;
use Session;
use App\Exports\AsignacionesExport;
use App\Imports\AsignacionesImport;
use Maatwebsite\Excel\Excel;
use PDF;

class AsignacionesController extends Controller
{
  private $excel;
  public function __construct(Excel $excel){
      $this->excel = $excel;
  }

     public function Asignaciones()
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login2');


            }
            else{
                    $consulta = asignaciones::orderBy('id_asignacion','DESC')
                                                ->take(1)->get();
                    $cuantos = count($consulta);
                    if($cuantos==0)
                    {
                        $idsigue = 1;
                    }
                    else{
                        $idsigue = $consulta[0]->id_asignacion + 1;
                    }

                    $user = user::all();
                    $empleados = Empleados::all();
                    $software = Software::all();
                    return view ('asignaciones')
                    ->with('idsigue', $idsigue)
                    ->with('user',$user)
                    ->with('empleados',$empleados)
                    ->with('software',$software);
                }
    }

    public function GuardarAsignaciones(Request $request)
    {
        $id_asignacion = $request->id_asignacion;
        $id = $request->id;
        $Id_empleado = $request->Id_empleado;
        $id_software = $request->id_software;
        $fecha_entrega = $request->fecha_entrega;
        $pruebas = $request->pruebas;

        $this->validate($request,[
            'id_asignacion'=>'required|integer',
            'id'=>'required|integer',
            'Id_empleado'=>'required|integer',
            'id_software'=>'required|integer',
        ]);


        $asignaciones= new asignaciones();
            $asignaciones->id_asignacion=$request->id_asignacion;
            $asignaciones->id=$request->id;
        	$asignaciones->Id_empleado=$request->Id_empleado;
			$asignaciones->id_software=$request->id_software;
            $asignaciones->fecha_entrega=$request->fecha_entrega;
            $asignaciones->pruebas=$request->pruebas;
        	$asignaciones->save();

       Session::flash('mensaje',"La asignación ha sido creado correctamente");
        return redirect('ReporteAsignaciones');

        //return $request;
        //echo"Datos guardados";

     }

     public function ReporteAsignaciones(){

        // $consulta= \DB::select("SELECT *
        // FROM productos");
		// //return $consulta;
	    // return view ('ReporteProductos')
        // ->with('consulta',$consulta);
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login2');


            }
            else{
                    $consulta=asignaciones::withTrashed()->join('users','asignaciones.id','=','users.id')
                    ->join('empleados','asignaciones.Id_empleado','=','empleados.Id_empleado')
                    ->join('software','asignaciones.id_software','=','software.id_software')
                    ->select('asignaciones.fecha_entrega','asignaciones.id_asignacion','users.name as users','asignaciones.pruebas','empleados.nombree as empleados',
                    'software.nombre as software','asignaciones.deleted_at')
                    ->orderby('asignaciones.id_asignacion')
                    ->get();
                    return view ('ReporteAsignaciones')
                    ->with('consulta',$consulta);
                }
            }

      public function ModificarAsignaciones($id){
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login2');


            }
            else{
                $consulta = asignaciones::where('id_asignacion','=',$id)
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
                return view('EditarAsignaciones')
                ->with('consulta',$consulta[0])
                ->with('user',$user)
                ->with('id',$consulta[0]->id)
                ->with('nomadmin',$nomadmin)
                ->with('empleados',$empleados)
                ->with('Id_empleado',$consulta[0]->Id_empleado)
                ->with('nomemp',$nomemp)
                ->with('software',$software)
                ->with('id_software',$consulta[0]->id_software)
                ->with('nomsof',$nomsof);

            }

        }

     public function EditarAsignaciones(Request $request, $id){

        $validacion = $request->validate([
		 'id_asignacion'=>'required',
            'id'=>'required',
            'Id_empleado'=>'required',
            'id_software'=>'required',
            'fecha_entrega'=>'required',
            'pruebas'=>'required',
		]);

        //  //return $request;
        // $this->validate($request,[
        //     'id_asignacion'=>'required',
            // 'id'=>'required',
            // 'Id_empleado'=>'required',
            // 'id_software'=>'required',
            // 'fecha_entrega'=>'required',
            // 'pruebas'=>'required',
       // ]);
        //return $request;
        // $asignaciones = asignaciones::withTrashed()->find($request->id);
        //     $asignaciones->id_asignacion=$request->id_asignacion;
        	// $asignaciones->id=$request->id;
            // $asignaciones->Id_empleado=$request->Id_empleado;
            // $asignaciones->id_software=$request->id_software;
            // $asignaciones->fecha_entrega=$request->fecha_entrega;
            // $asignaciones->pruebas=$request->pruebas;
        	//$asignaciones->save();

//return $request;
        asignaciones::where('id_asignacion', $id)->update($validacion);

        Session::flash('mensaje',"La asignación ha sido modificado correctamente");
        return redirect('ReporteAsignaciones');

     }

     //------------------------------------------------PDF------------------------------------------

     public function getPdfAsignaciones(){
         //$pdfasig = Asignaciones::all();
         $pdfasig = Asignaciones::join('users','asignaciones.id','=','users.id')
         ->join('empleados','asignaciones.Id_empleado','=','empleados.Id_empleado')
         ->join('software','asignaciones.id_software','=','software.id_software')
         ->select('asignaciones.fecha_entrega','asignaciones.id_asignacion','users.name as users','asignaciones.pruebas','empleados.nombree as empleados',
         'software.nombre as software')
         ->orderby('asignaciones.id_asignacion')
         ->get();
         $pdf = PDF::loadView('pdfAsignaciones', compact('pdfasig'));
         return $pdf->download('pdf_asignaciones.pdf');
     }

     public function DesactivarAsignacion($id_asignacion)
     {
         //una vez que reciba la id se va al modelo de empleados y busca el registro con la llave y se borra
         $asign = Asignaciones::find($id_asignacion);
         $asign->delete();

         Session::flash('mensaje','La Asignacion ha sido DESACTIVADO');
         return redirect()->route('ReporteAsignaciones');
     }

     public function ActivarAsignacion($id_asignacion)
     {
         //withTrashed muestra todos los activos y desactivados
         $consulta = asignaciones::withTrashed()->where('id_asignacion',$id_asignacion)->restore();

         Session::flash('mensaje','La Asignacion ha sido ACTIVADO');
         return redirect()->route('ReporteAsignaciones');

     }

     public function BorrarAsignacion($id_asignacion)
     {
         $consulta = asignaciones::withTrashed()->find($id_asignacion)->forceDelete();

         Session::flash('mensaje','La Asignacion ha sido BORRADO PERMANENTEMENTE');
         return redirect()->route('ReporteAsignaciones');

     }



     //------------------------------------------------EXCEL------------------------------------------
     public function exportAsignaciones(){
         return $this->excel->download(new AsignacionesExport, 'asignaciones.xlsx');
     }

 public function import(){
         $this->excel->import(new AsignacionesImport, request()->file('file'));
         return back();
     }





}
