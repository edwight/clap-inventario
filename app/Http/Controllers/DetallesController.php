<?php

namespace App\Http\Controllers;
use App\Http\Request\ProveedorDetalleRequest;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Detalle;
use Illuminate\Support\Facades\Auth;

class DetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos =  Producto::all();
        $proveedores = Proveedor::all();
        //return view('Detalles.index',['productos'=>$productos,'proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //return $request->all();
        
        
        $total = 0;
        /*
        if (isset($productosId)) {
            foreach ($productosId as $key) {
                $total = $total + $stock[$key-1];
            }
        }
        */
        $proveedor_id =  $request->input('proveedor');
        $localizacion_id =  $request->input('ubicacion');
        $detalle = new Detalle;
        //$detalle->stock = $total;//total de productos enviados
        $detalle->enviado = true;
        //$detalle->proveedor_enviado_id = Auth::user()->proveedor_id;//centro que envia
        $detalle->proveedor_id = $proveedor_id;//centro que va dirigido
        $detalle->localizacion_id = $localizacion_id;//a que centro va dirigido 
        //$detalle->user_id = $request->input('user');//usuario a que van dirigido 
            //$detalle->user_enviado = Auth::user()->id;
            //$detalle->user_recibido = $request->input('user_recibido');//usuario a que van dirigido 
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
                    'stock_pivot' => $stock[$productosId-1]
                ]);
            }
        }
        
        return redirect('proveedores/'.$proveedor_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = Detalle::find($id);
        $urlButton = false;
        return view('Detalles.show',compact('detalle','urlButton'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
