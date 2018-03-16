<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localizacion;
class UbicacionesController extends Controller
{
    public function show($id){
    	$localizacion = Localizacion::find($id);
    	//dd($localizacion);
    	//print($localizacion->id);

    	//print($localizacion->nombre);
    	//print($localizacion->proveedor->nombre);
    	//foreach ($localizacion->productos as $producto) {
    	//	print($producto->id.' '.$producto->nombre);
    	//}
    	return view('ubicaciones.show', compact('localizacion'));
    }
}
