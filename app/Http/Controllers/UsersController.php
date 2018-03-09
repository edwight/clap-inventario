<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        $modulo = 'Usuario';
        $moduloUrl = 'users';
        $urlButton = true;
        return view('User.index',compact('users','modulo','moduloUrl','urlButton'));
        //return User::all();
        //return Response::json(dato,'dato');

    }
    public function create(){
        $modulo = 'Usuario';
        $moduloUrl = 'users';
        $urlButton = true;
        $proveedores = Proveedor::all();
        return view('User.create',compact('modulo','moduloUrl','proveedores','urlButton'));
    }
    public function store(Request $request)
    {
        //return $request->all();

        $user = new User;
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->proveedor_id = $request->input('proveedor');
        $user->localizacion_id = $request->input('ubicacion');
        $user->remember_token = $request->input('_token');
        $user->save();

        return redirect('users');
    }
    public function show($id){
        $modulo = 'Usuario';
        $moduloUrl = 'users';
        $urlButton = true;
        $user = User::find($id);
    	return view('User.show',compact('modulo','moduloUrl','user','urlButton'));
    }
    public function delete(User $user){
    	$user->delete();
    }
}
