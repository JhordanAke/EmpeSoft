<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $table='personal';
    protected $primaryKey='id_personal';

    protected $with=['pues'];

    public $timestamps= false;

    public $Fillable=[
    	'id_peronal',
    	'nombre',
    	'apellido_p',
    	'apellido_m',
    	'id_puesto',
    	'contrasenia'
    ];

    public function pues(){
        return $this->belongsTo(Puesto::class,'id_puesto','id_puesto');
    }
}
