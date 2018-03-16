<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{ 
	public $timestamps = false;
	protected $fillable = [
        'nombre'
    ];
    public function proveedor(){
    	return $this->belongsTo('App\Models\Proveedor');
    }
   public function productos(){
    	return $this->belongsToMany('App\Models\Producto', 'producto_proveedor') 
    	->withPivot('producto_id','enviado','recibido','stock_pivot','proveedor_id','Localizacion_id');
    }
}
