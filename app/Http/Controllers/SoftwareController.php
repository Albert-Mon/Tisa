<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SoftwareExport;
use App\Imports\SoftwareImport;
use Maatwebsite\Excel\Excel;
use DataTables;
use PDF;
use Session;
use App\Models\Software;
use App\Models\Empleados;



class SoftwareController extends Controller
{
    private $excel;
    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    //------------------------------------------------PDF------------------------------------------

    public function getPdfSoftware(){
        $pdfsoftware = Software::all();
        $pdf = PDF::loadView('pdfsoftware', compact('pdfsoftware'));
        return $pdf->download('pdf_software.pdf');
    }

    //------------------------------------------------EXCEL------------------------------------------
    public function exportsoftware(){
        return $this->excel->download(new SoftwareExport, 'software.xlsx');
    }

public function import(){
        $this->excel->import(new SoftwareImport, request()->file('file'));
        return back();
    }

//------------------------------------------------CRUD------------------------------------------

    public function altasoftware()
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta = software::orderBy('id_software','DESC')
                                            ->take(1)->get();
                $cuantos = count($consulta);
                if($cuantos==0)
                {
                    $idsigue = 1;
                }
                else{
                    $idsigue = $consulta[0]->id_software + 1;
                }
                $empleados = Empleados::orderBy('nombree')->get();

                return view('altasoftware')
                        ->with('empleados',$empleados)
                        ->with('idsigue', $idsigue);
            }
        }



    public function guardarsoftware(Request $request)
    {
       // return $request;

       $this->validate($request,[

           'nombre' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
            'descripcion' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',  //Expresion regular
            'Id_empleado' => 'required',
            'pruebas'  => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
       ]);

       $software = new software;
       $software -> id_software   = $request->id_software;
       $software -> nombre        = $request->nombre;
       $software -> descripcion   = $request->descripcion;
       $software -> Id_empleado  = $request->Id_empleado;
       $software -> pruebas       = $request->pruebas;
       $software -> fecha_inicio  = $request->fecha_inicio;
       $software -> fecha_fin     = $request->fecha_fin;
       $software -> save();
       //return $request;

       Session::flash('mensaje',"El Software $request->nombre ha sido dado de ALTA");
        return redirect()->route('reportesoftware');
       //return $request;

       // Session::flash('mensaje',"El Software $request->nombre ha sido dado de ALTA");
       //  return redirect()->route('reportesoftware');


    }

    public function reportesoftware()
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta = software::withTrashed()->join('empleados','software.Id_empleado','=','empleados.Id_empleado')
                ->select('software.id_software','software.nombre',
                'software.descripcion','empleados.nombree as emple','software.pruebas',
                'software.fecha_inicio','software.fecha_fin','software.deleted_at')
                ->orderby('software.id_software')
                ->get();
                    return view ('reportesoftware')
                    ->with('consulta',$consulta);
            }
    }

    public function desactivarsoftware($id_software)
    {
        //una vez que reciba la id se va al modelo de empleados y busca el registro con la llave y se borra
        $software = software::find($id_software);
        $software->delete();

        Session::flash('mensaje','El Software ha sido DESACTIVADO');
        return redirect()->route('reportesoftware');
    }

    public function activarsoftware($id_software)
    {
        //withTrashed muestra todos los activos y desactivados
        $consulta = software::withTrashed()->where('id_software',$id_software)->restore();

        Session::flash('mensaje','El Software ha sido ACTIVADO');
        return redirect()->route('reportesoftware');

    }

    public function borrarsoftware($id_software)
    {
        $consulta = software::withTrashed()->find($id_software)->forceDelete();

        Session::flash('mensaje','El Software ha sido BORRADO PERMANENTEMENTE');
        return redirect()->route('reportesoftware');

    }

    public function modificarsoftware($id_software)
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{

                $consulta = software::where('id_software','=',$id_software)
                        ->get();
                $emp = empleados::where('Id_empleado','=',$consulta[0]->Id_empleado)
                        ->get();
                return view('EditarAsignaciones')
                ->with('consulta',$consulta[0])
                ->with('empleados',$empleados)
                ->with('Id_empleado',$consulta[0]->Id_empleado)
                ->with('nomemp',$nomemp);

            }
    }

    public function cambiarsoftware(Request $request)
    {
        $this->validate($request,[

            'nombre' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
            'descripcion' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú,]+$/',
            'Id_empleado' => 'required',
            'pruebas'  => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',

        ]);

        $software = software::find($request->id_software);
        $software -> nombre = $request->nombre;
        $software -> descripcion = $request->descripcion;
        $software -> Id_empleado = $request->Id_empleado;
        $software -> pruebas = $request->pruebas;
        $software -> fecha_inicio = $request->fecha_inicio;
        $software -> fecha_fin = $request->fecha_fin;
        $software -> save();

        Session::flash('mensaje',"El Software $request->nombre ha sido MODIFICADO");
         return redirect()->route('reportesoftware');
    }

}
