<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleabono extends Model
{
    //
    protected $table='detalle_abono';
    protected $primaryKey='id_detalle';

    public $Fillable=[
    	'id_detalle',
    	'monto',
    	'folio',
    	'fecha_abono'
    ];

}
