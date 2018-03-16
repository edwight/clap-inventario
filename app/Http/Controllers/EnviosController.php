<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Proveedor;

use Illuminate\Support\Facades\Auth;

class EnviosController extends Controller
{

	public function getEnviar(){
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        $detalles = Detalle::where('enviado',true)->get();
        return view('Enviar.enviar_rublos',compact('productos','proveedores','detalles'));
    }
    public function store(Request $request){
    	//validaciones 

    	//guardar 
    	//return $request->all();
    	$proveedor_id =  $request->input('proveedor');
        $localizacion_id =  $request->input('ubicacion');
        
        $detalle = new Detalle;
        //$detalle->stock = $total;//total de productos enviados
        //$detalle->enviado = true;
        //$detalle->proveedor_enviado_id = Auth::user()->proveedor_id;//centro que envia
        $detalle->proveedor_id = $proveedor_id;//centro que va dirigido
        $detalle->localizacion_id = $localizacion_id;//a que centro va dirigido 
        $detalle->observacion = $request->input('observacion');//a que centro va dirigido 
        //$detalle->user_id = $request->input('user');//usuario a que van dirigido 
            $detalle->user_envia = Auth::user()->id;
            $detalle->user_recibe = $request->input('user');//usuario a que van dirigido 
        
        $detalle->save();

        $proveedor_id =$request->input('proveedor');
        //$proveedor = Proveedor::find($proveedor_id);
        //$detalle->proveedor->save($proveedor);

        //return $proveedor->id;
        $productos = $request->input('productos_ids');
        $stock = $request->input('stock');
        //$productosId = $request->input('productos_ids');

        //return $productos;
        //$detalle->hasAnyProduct($productos_id);
        //return $stock;
        
        if (isset($productos)) 
        {
            foreach ($productos as $productosId) 
            {
                $producto = Producto::find($productosId);
                //$producto->decrement('stock_pivot',$stock[$productosId-1]);//resta la cantidad de producto enviada 
                $detalle->productos()->attach($producto,[
                    'proveedor_id' => $proveedor_id,
                    'localizacion_id' => $localizacion_id,
                    'stock_pivot' => $stock[$productosId-1]
                ]);
            }
        }
        return redirect('reportes_envios');
    }
    
}
