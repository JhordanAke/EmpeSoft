<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empeño extends Model
{
    //
    protected $table='empenios';
    protected $primaryKey='id_empenio';

    protected $with=['mutu'];

    public $timestamps= false;

    public $Fillable=[
    	'id_empenio',
    	'descripcion',
    	'fecha_empenio',
    	'limite',
    	'nombre_articulo',
    	'capital',
    	'status',
    	'id_mutuario'
    ];

      public function mutu(){
        return $this->belongsTo(Mutuario::class,'id_mutuario','id_mutuario');
    }
}
