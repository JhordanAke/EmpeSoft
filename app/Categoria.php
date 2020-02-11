<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table='categorias';
    protected $primaryKey='id_categoria';

    public $timestamps=false;

    public $Fillable=[
    	'id_categoria',
    	'nombre',
    	'tasa_interes'
    ];
}
