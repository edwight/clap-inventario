<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Localizacion;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Get the currently authenticated user...
        $user = Auth::user()->name;

        // Get the currently authenticated user's ID...
        $id = Auth::id();
        if (Auth::check()) {
            // The user is logged in...
        }
        return view('home',compact('id','user'));
    }
    public function myTestAddToLog()
    {

        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $modulo = 'Usuario';
        $moduloUrl = 'users';
        $urlButton = true;
        $logs = \LogActivity::logActivityLists();
        return view('User.logActivity.activity',compact('logs','modulo','moduloUrl','urlButton'));
    }
    
    public function getLocalizacion(Request $request)
    {
        $input = $request->input('option');
        $localizacion = Localizacion::where('proveedor_id',$input)->pluck('nombre', 'id');
        return $localizacion;
        
    }
    public function getUsers(Request $request)
    {
        $input = $request->input('option');
        $user = User::where('localizacion_id',$input)->pluck('name', 'id');
        return $user;
        
    }

}
