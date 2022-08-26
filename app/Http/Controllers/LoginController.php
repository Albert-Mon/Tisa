<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Administradores;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function login2()
    {
        return view('login2');
    }



    public function cerrarsesion(){
        Session::forget('sessionadmin');
        Session::forget('sessionid');
        Session::forget('sessiontipoad');
        Session::flush();
        Session::flash('mensaje', "Sesion cerrada!!!");
        return redirect()->route('login2');

    }

    public function vista()
    {

        $sessionid = session('sessionid');
        if($sessionid =='')
        {
            Session::flash('mensaje', "Debes Iniciar Sesion primero");
            return redirect()->route('login2');

        }
        else{
            return view('reporteadmin');
        }
    }
    /*
    public function vista()
    {

            return view('vista');
    }*/

    public function validar(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',

        ]);

        /*$paswordEncriptado = Hash::make($request->pass);
        echo $paswordEncriptado;*/
        $consulta = user::where('email','=',$email)
                                // ->where('password','=',$password)
        //                             //->where('activo','=','si')
                                     ->get();

        if (count($consulta)==0)

         {
            Session::flash('mensaje', "El Correo o Contraseña no son validos");
            return redirect()->route('login2');

         }
        else{
         Session::put('sessionadmin', $consulta[0]->name . ' ' .$consulta[0]->app);
         Session::put('sessionid', $consulta[0]->id);
         Session::put('sessiontipoad', $consulta[0]->tipoad);
        return redirect()->route('reporteadmin');
        //
       }

    }
}
