<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AdministradoresExport;
use App\Imports\AdministradoresImport;
use Maatwebsite\Excel\Excel;
use DataTables;
use PDF;
use Session;

use App\Models\User;

class AdministradoresController extends Controller
{
    private $excel;
    public function __construct(Excel $excel){
        $this->excel = $excel;
    }


    //------------------------------------------------PDF------------------------------------------

    public function getPdfAdministradores(){
        $pdfadmin =user::all();
        $pdf = PDF::loadView('pdf', compact('pdfadmin'));
        return $pdf->download('administradores.pdf');
    }


    //------------------------------------------------EXCEL------------------------------------------
    public function exportadmin(){
        return $this->excel->download(new AdministradoresExport, 'admis.xlsx');
    }

public function import(){
        $this->excel->import(new AdministradoresImport, request()->file('file'));
        return back();
    }





 //------------------------------------------------CRUD------------------------------------------


    public function altaadmin()
    {
       
                $consulta = user::orderBy('id','DESC')
                                            ->take(1)->get();
                $cuantos = count($consulta);
                if($cuantos==0)
                {
                    $idsigue = 1;
                }
                else{
                    $idsigue = $consulta[0]->id + 1;
                }

                return view('altaadmin')
                        ->with('idsigue', $idsigue);
                //return view ('altaadmin');
            
        }

    public function guardaradmin(Request $request)
    {
       // return $request;

       $this->validate($request,[
           //'ClaveAdministrador'=>'required|regex:/^[A][D][M][-][0-9]+$/',
           'img'=>'image|mimes:gif,jpeg,png',
           'nusuario'=>'required|regex:/^[A-Z,a-z,á,é,í,ó,ú,_,0-9]+$/',
           'name'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
           'app'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
           'apm'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
           'email'=>'required|email',
           'password'=>'required',
           'tipoad'=>'required',
       ]);

       $file = $request->file('img',);
       if($file<>"")
       {
       $img = $file->getClientOriginalName();
       $img2 = $request->id . $img;
       \Storage::disk('local')->put($img2, \File::get($file));
       }
       else{
           $img2 = "sinfoto.jpg";
       }


       $admin = new user;
       $admin -> id = $request->id;
       $admin -> img = $img2;
       $admin -> nusuario = $request->nusuario;
       $admin -> name = $request->name;
       $admin -> app = $request->app;
       $admin -> apm = $request->apm;
       $admin -> email = $request->email;
       $admin -> password = $request->password;
       $admin -> tipoad = $request->tipoad;
       $admin -> save();

       Session::flash('mensaje',"El Administrador $request->name $request->app ha sido dado de ALTA");
        return redirect()->route('reporteadmin');


    }

    public function reporteadmin()
    {
        
        $consulta = user::withTrashed()->select('users.id','users.img',
        'users.nusuario','users.name','users.app','users.apm',
        'users.email','users.deleted_at')        // si manda null es porque no esta desactivado y la fecha es que si lo esta.
        ->get();

                    return view ('reporteadmin')
                    ->with('consulta',$consulta);
            
    }

    public function desactivaradmin($id)
    {
        //una vez que reciba la id se va al modelo de empleados y busca el registro con la llave y se borra
        $admin = user::find($id);
        $admin->delete();

        Session::flash('mensaje','El Administrador ha sido DESACTIVADO');
        return redirect()->route('reporteadmin');
    }

    public function activaradmin($id)
    {
        //withTrashed muestra todos los activos y desactivados
        $consulta = user::withTrashed()->where('id',$id)->restore();

        Session::flash('mensaje','El Administrador ha sido ACTIVADO');
        return redirect()->route('reporteadmin');

    }

    public function borraradmin($id)
    {
        $consulta =user::withTrashed()->find($id)->forceDelete();

        Session::flash('mensaje','El Administrador ha sido BORRADO PERMANENTEMENTE');
        return redirect()->route('reporteadmin');

    }

    public function modificaradmin($id)
    {

        
                    $consulta = user::withTrashed()->select('users.id','users.img',
                    'users.nusuario','users.name','users.app','users.apm',
                    'users.email','users.password', 'users.tipoad')
                ->where('id',$id)
                ->get();

                    return view ('modificaradmin')
                    ->with('consulta',$consulta[0]);
        

    }

    public function cambiaradmin(Request $request)
    {
        $this->validate($request,[
            //'ClaveAdministrador'=>'required|regex:/^[A][D][M][-][0-9]+$/',
            'img'=>'image|mimes:gif,jpeg,png',
            'nusuario'=>'required|regex:/^[A-Z,a-z,á,é,í,ó,ú,_,0-9]+$/',
            'name'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'app'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'apm'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'email'=>'required|email',
            'password'=>'required',
            'tipoad' =>'required'

        ]);

        $file = $request->file('img');
        if($file<>"")
        {
        $img = $file->getClientOriginalName();
        $img2 = $request->id . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }

        $admin =user::find($request->id);
        $admin -> id = $request->id;
        if($file<>"")
        {
            $admin -> img = $img2 ;
        }
        $admin -> nusuario = $request->nusuario;
        $admin -> name = $request->name;
        $admin -> app = $request->app;
        $admin -> apm = $request->apm;
        $admin -> email = $request->email;
        $admin -> password = $request->password;
        $admin -> tipoad = $request->tipoad;
        $admin -> save();

        Session::flash('mensaje',"El Administrador $request->name $request->app ha sido MODIFICADO");
         return redirect()->route('reporteadmin');
    }






    /*

    public function index(Request $request){
        if($request->ajax()){
            $data = Administradores::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('otros', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editCustomer">Editar</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteCustomer">Borrar</a>';
                    return $btn;                    })
                ->rawColumns(['otros'])
                ->make(true);
        }
        return view('welcome');
    }

    public function store(Request $request){
        if($request->Costomer_id !=''){
            Administradores::where('id', $request->Costomer_id)->update([
                                    'clave'=>$request->clave,
                                    'nusuario'=>$request->nusuario,
                                    'name'=>$request->name,
                                    'app'=>$request->app,
                                    'apm'=>$request->apm,
                                    'email'=>$request->email,
                                    'passwordword'=>$request->passwordword
            ]);
        }
        else{
            Administradores::create($request->only('clave','nusuario','name','app','apm','email','passwordword'));
        }
        return response()->json(['success'=>'El admin ha sido guardado']);
    }

    public function edit($id){
        $query = Administradores::find($id);
        return response()->json($query);
    }

public function destroy($id){
        Administradores::find($id)->delete();
        return response()->json(['success'=>'Cliente Borrado !!!']);
    }
    */

}
