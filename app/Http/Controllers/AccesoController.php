<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use Session;
use Redirect;
use Cookie;
use Cache;

class AccesoController extends Controller
{
     public function validar(Request $request){


    	$usuario=$request->usuario;
    	$password=$request->pass;



    	$resp = Personal::where('nombre','=',$usuario)
    	->where('contrasenia','=',$password)
    	->get();

    	//return $resp;

        

    	if (count($resp)>0) 
        {
            $user=$resp[0]->nombre;
            Session::put('puesto',$resp[0]->pues->nombre);
            Session::put('nombre',$user);

            if ($resp[0]->pues->nombre=='Administrador') {
            	return Redirect::to('ad');
            }
            elseif ($resp[0]->pues->nombre=='Empleado') {
            	return Redirect::to('mutu');
            }
        }
    	else
    	{
    		return Redirect::to('error');
    	}
        // return 'HOLA';
    	
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }

}
