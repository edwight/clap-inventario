<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Detalle;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores =  Proveedor::all();
        $modulo = 'Clap';
        $moduloUrl = 'proveedores';
        $urlButton = true;
        return view('Proveedor.index',compact('proveedores','modulo','moduloUrl','urlButton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulo = 'Clap';
        $moduloUrl = 'proveedores';
        $urlButton = true;
        return view('Proveedor.create',compact('modulo','moduloUrl','urlButton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        Proveedor::create($request->all());
        return redirect('proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->proveedor_id == $id){

            $proveedor = Proveedor::find($id); //User::with('Favourite')->get();
            $detalles = Detalle::where('proveedor_id',$id)->get();
            $productos = Producto::where('stock','>','0')->get();
            return view('Proveedor.show',compact(
                'proveedor',
                'proveedores',
                'productos',
                'detalles'
                ));
        //return $producto;
        }
        else{
            return redirect('proveedores');
            //return Redirect::back()->withErrors(['msg', 'The Message']);
        }
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
