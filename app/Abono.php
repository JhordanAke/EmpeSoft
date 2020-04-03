<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    //
    protected $table='abonos_capital';
    protected $primaryKey='folio';


    public $Fillable=[
    	'folio',
    	'abono',
    	'id_empenio'
    ];

    public function empenio(){
    	return $this->belongsTo(Empeño::class,'id_empenio','id_empenio');
    }

    public function detalle(){
    	return $this->hasMany('App\Detalleabono','folio','folio');
    }
}
