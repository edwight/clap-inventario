<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;
class ReportesController extends Controller
{
    public function getReporte(){
    	$detalles = Detalle::all();
    	return view('Reporte.getReporte',compact('detalles'));
    }
}
