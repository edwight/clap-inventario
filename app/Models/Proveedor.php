<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];
    public function productos(){
    	return $this->belongsToMany('App\Models\Producto', 'producto_proveedor') 
    	->withPivot('producto_id','enviado','recibido','stock_pivot','proveedor_id');
    }
    public function users(){
    	return $this->hasMany('App\User');
    }
    public function localizaciones(){
        return $this->hasMany('App\Models\Localizacion');
    }
}
