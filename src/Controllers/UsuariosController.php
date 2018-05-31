<?php

namespace Digitalmiig\Usuariomiig\Controllers;


use Illuminate\Routing\Controller;
use DB;
use Input;
use Hash;
use Illuminate\Http\Request;
use Digitalmiig\Usuariomiig\User;

class UsuariosController extends Controller{


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function index()
 {
  $users = DB::table('rols')
  ->join('users', 'rols.id', '=', 'users.rol_id')->get();
   return view('usuariomiig::template')->with('users', $users);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $password = Input::get('password');
        $remember = Input::get('_token');
        $user = new User;
        $user->name = Input::get('name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->address = Input::get('address');
        $user->phone = Input::get('phone');;
        $user->rol_id = Input::get('level');
        $user->regionid = Input::get('region');
        $user->ciudadid = Input::get('agencia');
        $user->identidad = Input::get('identidad');
        $user->remember_token = Input::get('_token');
        $user->password = Hash::make($password);
        $user->remember_token = Hash::make($remember);
        $user->save();

        return Redirect('/usuarios')->with('status', 'ok_create');

    }

       public function createpro()
    {
     
        $proyeccion = new Proyeccion;
        $proyeccion->date_presentacion = Input::get('presentacion');
        $proyeccion->date_cierre = Input::get('definicion');
        $proyeccion->valor = Input::get('ventas');
        $proyeccion->cliente_id = Input::get('colegio');
        $proyeccion->save();

        return Redirect('/proyecciones/'.$proyeccion->cliente_id)->with('status', 'ok_create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ident = User::find($id);       
        $colegios = DB::table('colegios')
        ->where('user_id', '=', $id)
        ->join('ciudades', 'ciudades.ids', '=', 'colegios.ciudad_id')
        ->get();
        return view('colegiomiig::colegios')->with('colegios', $colegios)->with('ident', $ident);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $rols = DB::table('rols')
        ->join('users','rols.id','=','users.rol_id')
        ->where('users.id', '=', $id)->get();
        $usuarios = User::find($id);
        $usuariosregion = DB::table('users')
        ->join('regiones','regiones.id','=','users.regionid')
        ->where('users.id', '=', $id)->get();
        $regiones = DB::table('regiones')->get();
        return view('usuariomiig::editar-usuario')->with('usuarios', $usuarios)->with('rols', $rols)->with('regiones', $regiones)->with('usuariosregion', $usuariosregion);
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
    $input = Input::all();
    $user = User::find($id);
    $user->name = Input::get('name');
    $user->last_name = Input::get('last_name');
    $user->email = Input::get('email');
    $user->address = Input::get('address');
    $user->phone = Input::get('phone');
    $user->regionid = Input::get('region');
    $user->ciudadid = Input::get('agencia');
    $user->save();
    return Redirect('/usuarios')->with('status', 'ok_update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        
        return Redirect('/usuarios')->with('status', 'ok_delete');
    }


}