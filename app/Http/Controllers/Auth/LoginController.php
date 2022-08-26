<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function cerrarsesion(){
        Session::forget('sessionadmin');
        Session::forget('sessionid');
        Session::forget('sessiontipoad');
        Session::flush();
        Session::flash('mensaje', "Sesion cerrada!!!");
        return redirect()->route('login');

    }

    public function vista()
    {

        $sessionid = session('sessionid');
        if($sessionid =='')
        {
            Session::flash('mensaje', "Debes Iniciar Sesion primero");
            return redirect()->route('login');

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
        return $request;

        /*$paswordEncriptado = Hash::make($request->pass);
        echo $paswordEncriptado;*/
        // $consulta = user::where('email','=',$email)
        //                          ->where('password','=',$password)
        //                              ->get();


       //  if (count($consulta)==0)
       //
       //   {
       //      Session::flash('mensaje', "El Correo o Contraseña no son validos");
       //      return redirect()->route('login');
       //
       //   }
       //  else{
       //   Session::put('sessionadmin', $consulta[0]->name . ' ' .$consulta[0]->app);
       //   Session::put('sessionid', $consulta[0]->id);
       //   Session::put('sessiontipoad', $consulta[0]->tipoad);
       return redirect()->route('reporteadmin');
       //  //
       // }

    }
}
