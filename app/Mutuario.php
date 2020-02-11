<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutuario extends Model
{
    //
    protected $table='mutuarios';
    protected $primaryKey='id_mutuario';

    public $timestamps= false;

    public $Fillable=[
    	'id_mutuario',
    	'nombre',
    	'apellido_p',
    	'apellido_m',
    	'telefono',
    	'direccion',
    	'localidad'
    ];
}
