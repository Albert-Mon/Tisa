<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\EmpleadosImport;
use App\Models\Empleados;
//use App\Imports\EmpleadosImport;
use App\Exports\EmpleadosExport;
use Maatwebsite\Excel\Excel;
use Session;
use PDF;

class EmpleadosController extends Controller{

    private $excel;
    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    // PDF

    public function pdfempleados(){
        $pdfempleados = Empleados::all();
        $pdf = PDF::loadView('pdfempleados', compact('pdfempleados'));
        return $pdf->download('ReporteEmpleados.pdf');

    }


    //------------------------------------------------EXCEL------------------------------------------

    public function exportempleados(){
        return $this->excel->download(new EmpleadosExport, 'Empleados.xlsx');
    }


    //ALTA------------------------------------------------------------------------------------>
    public function altaempleados()
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta = Empleados::orderBy('Id_empleado','DESC')
                                            ->take(1)->get();
                $cuantos = count($consulta);
                if($cuantos==0)
                {
                    $idsigue = 1;
                }
                else{
                    $idsigue = $consulta[0]->Id_empleado + 1;
                }

                return view('altaempleados')
                        ->with('idsigue', $idsigue);
            }

        }
    public function guardarempleados(Request $request)
    {
       //VALIDACIONES------------->

       $this->validate($request,[
        'nombree'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
        'apellidoe'=> 'required|regex:/^[A-Z,a-z, ,0-9]+$/',
        'correo'=> 'required|email',
        'usuario'=> 'required|regex:/^[A-Z,a-z, ,0-9]+$/',
        'img'=>'image|mimes:gif,jpeg,jpg,png'
       ]);

       $file = $request ->file('img');
       if($file<>"")
       {
       $img =$file->getClientOriginalName();
       $img2 =$request->Id_empleado . $img;
       \Storage::disk('local')->put($img2, \File::get($file));
       }
       else{
           $img2 = "sinfoto.jpg";
       }
         $Empleados = new Empleados;
         $Empleados -> nombree= $request-> nombree;
         $Empleados -> apellidoe = $request-> apellidoe;
         $Empleados -> correo = $request-> correo;
         $Empleados -> usuario = $request-> usuario;
         $Empleados -> contra = $request-> contra;
         $Empleados-> img = $img2;
         $Empleados -> save();

       Session::flash('mensajes',"El Empleado $request->nombree ha sido registrada");
        return redirect()->route('reporteempleados');


    }
    //REPORTE------------------------------------------------------------------------------------------------------->

    public function reporteempleados()
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                $consulta = Empleados::withTrashed()->select('Empleados.Id_empleado','Empleados.nombree','Empleados.apellidoe'
                    ,'Empleados.correo','Empleados.usuario','Empleados.contra','Empleados.deleted_at','Empleados.img')
                    ->get();

                return view ('reporteempleados')->with ('consulta',$consulta);

            }
        }
//ELIMINACION LOGICA-------------------------------------------------->
    public function desactivarempleados($Id_empleado)
    {
        $emple = Empleados::find($Id_empleado);
        $emple->delete();

        Session::flash('mensajes',' Ha sido DESACTIVADO');
        return redirect()->route('reporteempleados');
    }
//RESTAURACIÓN---------------------------------------------------------->
    public function activarempleados($Id_empleado)
    {
        $consulta = Empleados::withTrashed()->where('Id_empleado',$Id_empleado)->restore();

        Session::flash('mensajes','Ha sido ACTIVADO');
        return redirect()->route('reporteempleados');

    }
//ELIMINACION FISICA----------------------------------------------------------------->
    public function borrarempleados($Id_empleado)
    {
        $consulta = Empleados::withTrashed()->find($Id_empleado)->forceDelete();

        Session::flash('mensajes','Registro BORRADO DEFINITIVAMENTEMENTE');
        return redirect()->route('reporteempleados');

    }
//MODIFICACION-------------------------------------------------------------------------->
    public function modificarempleados($Id_empleado)
    {
        $sessionid = session('sessionid');
        $sessiontipoad = session('sessiontipoad');
        if($sessionid =='' or $sessiontipoad =='')
        {

            Session::flash('mensaje', "Debes Iniciar Sesion primero");
                return redirect()->route('login');


            }
            else{
                    $consulta = Empleados::withTrashed()->select('Empleados.Id_empleado','Empleados.nombree','Empleados.apellidoe'
                    ,'Empleados.correo','Empleados.usuario','Empleados.contra','Empleados.img')
                ->where('Id_empleado',$Id_empleado)
                ->get();

                    return view ('modificarempleados')
                    ->with('consulta',$consulta[0]);
            }

    }

    public function cambiarempleados(Request $request)
    {
        $this->validate($request,[
            'nombree'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'apellidoe'=> 'required|regex:/^[A-Z,a-z, ,0-9]+$/',
            'correo'=> 'required|email',
            'usuario'=> 'required|regex:/^[A-Z,a-z, ,0-9]+$/',
            'img'=>'image|mimes:gif,jpeg,jpg,png'

        ]);

        $file = $request->file('img');
        if($file<>"")
        {
        $img = $file->getClientOriginalName();
        $img2 = $request->Id_empleado . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }

        $Empleados = Empleados::find($request->Id_empleado);
        $Empleados -> Id_empleado = $request->Id_empleado;
        $Empleados -> nombree= $request-> nombree;
        $Empleados -> apellidoe = $request-> apellidoe;
        $Empleados -> correo = $request-> correo;
        $Empleados -> usuario = $request-> usuario;
        $Empleados -> contra = $request-> contra;

         if($file<>"")
        {
            $Empleados -> img = $img2 ;
        }
            $Empleados -> save();

        Session::flash('mensajes',"Se modificaron los datos de $request->nombree");
         return redirect()->route('reporteempleados');
    }
}
