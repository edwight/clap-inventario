<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos =  Producto::orderBy('id','desc')->get();
        $proveedores = Proveedor::all();
        $modulo = 'Producto';
        $moduloUrl = 'productos';
        $urlButton = true;
        return view('Producto.index',compact('productos','proveedores','modulo','moduloUrl','urlButton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $modulo = 'Producto';
        $moduloUrl = 'productos';
        return view('Producto.create',compact('categorias','marcas','modulo','moduloUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->();
        

        $producto = new Producto;
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        //stock mayor que cero
        $producto->stock = $request->input('stock');
        $producto->unidad = $request->input('unidad');
        $producto->activo = true;

        $categoria_id = $request->input('categoria');
        $categoria = Categoria::find($categoria_id);
        $producto->categoria()->associate($categoria);

        $marca_id = $request->input('marca');
        $marca = Marca::find($marca_id);
        $producto->marca()->associate($marca);
        
        $producto->save();
        //$categoria_id = $request->input('categoria');
        //$categoria = Categoria::find($categoria_id);
        //$categoria->productos()->save()
        //$producto->categoria->nombre =$request->input('categoria');
        //$producto->marca->nombre = $request->input('marca');
        

        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = 'Producto';
        $moduloUrl = 'productos';
        $urlButton = true;
        $producto = Producto::find($id);
        //return $producto->categoria->id;
        return view('Producto.show', compact('producto','modulo','moduloUrl','urlButton'));
        //return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $modulo = 'Producto';
        $moduloUrl = 'productos';
        return view('Producto.edit',compact('producto','categorias','marcas','modulo','moduloUrl'));
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
        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        //stock mayor que cero
        $producto->stock = $request->input('stock');
        $producto->unidad = $request->input('unidad');
        $producto->activo = true;

        $categoria_id = $request->input('categoria');
        $categoria = Categoria::find($categoria_id);
        $producto->categoria()->associate($categoria);

        $marca_id = $request->input('marca');
        $marca = Marca::find($marca_id);
        $producto->marca()->associate($marca);
        
        $producto->save();

        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
    }
}
