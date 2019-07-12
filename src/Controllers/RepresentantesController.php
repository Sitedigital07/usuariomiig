<?php

namespace Digitalmiig\Usuariomiig\Controllers;


use Illuminate\Routing\Controller;
use DB;
use Input;
use Hash;
use \Crypt;
use Illuminate\Http\Request;
use Digitalmiig\Usuariomiig\User;
use Digitalmiig\Usuariomiig\Fecha;
use Digitalmiig\Usuariomiig\Fechameta;
use Digitalmiig\Colegiomiig\Essegcon;
use Digitalmiig\Usuariomiig\Representante;
use Digitalmiig\Usuariomiig\Descuento;
use Illuminate\Support\Facades\Auth;

class RepresentantesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function index()
    {

         $representantes = DB::table('ciudades')
            ->join('representantes', 'representantes.agencia', '=', 'ciudades.ids')
            ->get();
        return view('usuariomiig::representantes')->with('representantes', $representantes);
    }


    public function representantes()
    {

        $roles = DB::table('ciudades')->where('asistente', '=', Auth::user()->id)->pluck('ids');

          $representantes = DB::table('representantes')
                    ->whereIn('agencia', $roles)->get();


        return view('usuariomiig::representantes-region')->with('representantes', $representantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new Representante;
        $user->nombre = Input::get('nombre');
        $user->email = Input::get('email');
        $user->apellido = Input::get('apellido');
        $user->identificacion = Input::get('identificacion');
        $user->telefono = Input::get('telefono');
        $user->region_id = Input::get('category');
        $user->agencia = Input::get('subcategory');
        $user->bb = Input::get('vinculo1');
        $user->pr = Input::get('vinculo2');;
        $user->ig = Input::get('vinculo3');
        $user->plataforma = Input::get('vinculo4');
        $user->save();

    return Redirect('representantes')->with('status', 'ok_create');
    }


       public function createfecha()
    {
        $user = new Fecha;
        $user->fecha = Input::get('fecha');
        $user->colegio_id = Input::get('colegio');
        $user->ano = Input::get('ano');
        $user->save();

    return Redirect('proyeccionventasadopcion/'.$user->colegio_id)->with('status', 'ok_create');
    }

        public function updatefecha($id)
    {
        $input = Input::all();
        $user = Fecha::find($id);
        $user->fecha = Input::get('fecha');
        $user->colegio_id = Input::get('colegio');
        $user->ano = Input::get('ano');
        $user->save();

    return Redirect('proyeccionventasadopcion/'.$user->colegio_id)->with('status', 'ok_create');
    }

           public function createfechameta()
    {
        $user = new Fechameta;
        $user->fecha = Input::get('fecha');
        $user->colegio_id = Input::get('colegio');
        $user->ano = Input::get('ano');
        $user->save();

    return Redirect('proyeccionventas/'.$user->colegio_id)->with('status', 'ok_create');
    }


    public function createdescuento()
    {
        $user = new Descuento;
        $user->descuento = Input::get('descuento');
        $user->colegio_id = Input::get('colegio_id');
        $user->ano = Input::get('ano');
        $user->rol_id = Input::get('rol_id');
        $user->save();

    return Redirect('colegio-descuento/'.$user->colegio_id)->with('status', 'ok_create');
    }


        public function editardescuento($id)
    {
        $input = Input::all();
        $user = Descuento::find($id);
        $user->descuento = Input::get('descuento');
        $user->colegio_id = Input::get('colegio_id');
        $user->ano = Input::get('ano');
        $user->rol_id = Input::get('rol_id');
        $user->save();
        if(Auth::user()->rol_id == 3){
        return Redirect('colegio-descuentoaud/'.$user->colegio_id)->with('status', 'ok_update');
         }
        else{
        return Redirect('colegio-descuento/'.$user->colegio_id)->with('status', 'ok_update');
        }
    }


       public function editaressegcol($id)
    {
        $input = Input::all();
        $user = Essegcon::find($id);
        $user->miig = Input::get('miig');
        $user->valor = Input::get('valor');
        $user->identificador = Input::get('identificador');
        $user->save();
        return Redirect('carga-esseg')->with('status', 'ok_update');
    
    }


      public function eliminardescuento($id)
    {
    $users = Descuento::find($id);
    $users->delete();
    return Redirect('colegio-descuento/'.$users->colegio_id)->with('status', 'ok_delete');
    }


        public function updatefechameta($id)
    {
        $input = Input::all();
        $user = Fechameta::find($id);
        $user->fecha = Input::get('fecha');
        $user->colegio_id = Input::get('colegio');
        $user->ano = Input::get('ano');
        $user->save();

    return Redirect('proyeccionventas/'.$user->colegio_id)->with('status', 'ok_create');
    }





        public function createventa()
    {
        $user = new Venta;
        $user->venta = Input::get('venta');
        $user->colegio_id = Input::get('colegio_id');
        $user->ano = Input::get('ano');
        $user->save();

    return Redirect('proyeccionventas/'.$user->colegio_id)->with('status', 'ok_create');

    }



     public function colegios($id)
    {
         $id =  Crypt::decrypt($id);
         $ano = DB::table('configuracion')->where('id', '=', 1)->get();
         $colegios = DB::table('colegios')
            ->join('ciudades', 'ciudades.ids', '=', 'colegios.ciudad_id')
            ->where('representante_id', '=', $id)
        ->get();
         $representantes = DB::table('representantes')->get();
   

        return view('colegiomiig::colegios-region')->with('colegios', $colegios)->with('ano', $ano)->with('representantes', $representantes);
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
            ->join('representantes', 'representantes.id', '=', 'colegios.representante_id')
            ->join('ciudades', 'ciudades.ids', '=', 'colegios.ciudad_id')
            ->where('representantes.id', '=', $id)
            ->get();


        
        return view('usuariomiig::colegio-representante')->with('colegios', $colegios)->with('ident', $ident);
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
        $input = Input::all();
        $representante = Representante::find($id);
        $representante->nombre = Input::get('nombre');
        $representante->email = Input::get('email');
        $representante->apellido = Input::get('apellido');
        $representante->identificacion = Input::get('identificacion');
        $representante->telefono = Input::get('telefono');
        $representante->region_id = Input::get('category');
        $representante->agencia = Input::get('subcategory');
        $representante->bb = Input::get('vinculo1');
        $representante->pr = Input::get('vinculo2');
        $representante->ig = Input::get('vinculo3');
        $representante->plataforma = Input::get('vinculo4');
        $representante->save();
    return Redirect('/representantes')->with('status', 'ok_update');
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