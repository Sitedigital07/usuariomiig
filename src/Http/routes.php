<?php
use Carbon\carbon;

// Rol Auditor

Route::post('loginada', function(){ 
	
	$credentials = array(
    'email' => Input::get('username'), 
    'password' => Input::get('password'),
    );
	if (Auth::attempt($credentials)){
      if (Auth::user()->rol_id == 1) 
    {
      return Redirect::to('/usuarios');
    }
    elseif (Auth::user()->rol_id == 2) {
      return Redirect::to('/auditorjr');
    }
        //return Redirect::to_action('user@index'); you'd use this if it's not AJAX request
    }else{
        return Response::json('Error logging in', 400);
        /*return Redirect::to_action('home@login')
        -> with_input('only', array('new_username')) 
        -> with('login_errors', true);*/
    }
});


Route::post('logindesa', function(){

	$credentials = Input::only('email', 'password'); 
    if ( ! Auth::attempt($credentials))
    {
        return Redirect::back()->withMessage('Invalid credentials');
    }
    if (Auth::user()->rol_id == 1) 
    {
        return Redirect::to('/usuarios');
    }
    elseif (Auth::user()->rol_id == 2) {
        return Redirect::to('/auditorjr');
    }
    elseif (Auth::user()->rol_id == 3) {
        return Redirect::to('/gerentenac');
    }
    elseif (Auth::user()->rol_id == 4) {
        return Redirect::to('/gerentereg');
    }
    elseif (Auth::user()->rol_id == 5) {
        return Redirect::to('/representante');
    }
    elseif (Auth::user()->rol_id == 6) {
        return Redirect::to('/vendedor');
    }
    return Redirect::to('/');
});

Route::group(['middleware' => ['auditor']], function (){
 Route::get('/informe/descuentos', function () {

  $ano = Input::get('ano');
    $adopcionescon = DB::table('campos')
->join('esseg_con','esseg_con.colegio_id','=','campos.colegio_id')
->leftJoin('descuento','descuento.colegio_id','=','campos.colegio_id')
->leftJoin('fecha_meta','fecha_meta.colegio_id','=','campos.colegio_id')
->leftJoin('fecha_adopcion','fecha_adopcion.colegio_id','=','campos.colegio_id')

 ->select(
 DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_metval'),
 DB::raw('campos.colegio_id as colegio_id'),
 DB::raw('fecha_meta.fecha as fecha_meta'),
  DB::raw('fecha_adopcion.fecha as fecha_adopcion'),
  DB::raw('valor as valor'),
  DB::raw('descuento as descuento'),
 DB::raw('campos.ano as ano'))
 ->where('campos.ano','=',$ano)

 ->groupBy('campos.colegio_id')
 ->get();


    $colegios = DB::table('colegios')
    ->join('descuento', 'colegios.id', '=', 'descuento.colegio_id')
    ->select(
                  'colegios.id',
                  'colegios.codigo',
                  'colegios.nombres',
                  'descuento.descuento',
                  'descuento.ano'
          )
    ->where('descuento.ano','=',$ano)
    ->get();


         if(DB::table('descuento')->where('ano','=',$ano)->first()){
        return view('usuariomiig::informes-descuento')->with('colegios', $colegios)->with('adopcionescon', $adopcionescon);
}
    else{
 return view('colegiomiig::respuesta-filtro');

}


 });

Route::get('/usuarios', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@index');
Route::get('/formatear-colegio/{id}', 'Digitalmiig\Colegiomiig\Controllers\PoblacionesController@format');
Route::post('/crearusuario', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@create');

Route::get('/crear-usuario', function () {
    $rols = DB::table('rols')->get();
    $regiones = DB::table('regiones')->get();
    return view('usuariomiig::crear-usuario')->with('rols', $rols)->with('regiones', $regiones);
});

Route::get('/editar-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@edit');

Route::get('/editar-password/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@password');

Route::post('/update-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@update');

Route::post('/update-usuariopass/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@updatepass');

Route::get('/eliminar-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@destroy');

});



Route::group(['middleware' => ['auditor']], function (){

    Route::get('/descuentos-asignados', function () {

 return view('usuariomiig::descuentoasignado');    
});

Route::get('/representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@index');


Route::get('excel-representantes', function () {
    return view('usuariomiig::importExport');
});

Route::get('exportador-representantes/{type}', 'Digitalmiig\Usuariomiig\Controllers\MaatwebsiteRepresentantesController@exportador');

Route::post('importador-representantes', 'Digitalmiig\Usuariomiig\Controllers\MaatwebsiteRepresentantesController@importador');




Route::get('/crear-representante', function () {
    $categories = Digitalmiig\Usuariomiig\Region::all();
    return view('usuariomiig::crear-representante')->with('categories', $categories);
});

Route::post('/crearrepresentante', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@create');



Route::get('/editar-representante/{id}', function ($id) {
    $categories = Digitalmiig\Usuariomiig\Region::all();
    $represen = DB::table('representantes')->where('id', $id)->get();
    $representantes = DB::table('representantes')
    ->join('regiones', 'regiones.id', '=', 'representantes.region_id')
    ->join('ciudades', 'ciudades.ids', '=', 'representantes.agencia')
    ->where('representantes.id', $id)->get();
    return view('usuariomiig::editar-representante')->with('representantes', $representantes)->with('categories', $categories)->with('represen', $represen);
});

Route::post('/updaterepresentante/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@update');

Route::get('/colegio-representante/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@show');

Route::get('generar-usuario/{id}', function ($id) {
    $representantes = DB::table('representantes')->where('id', '=', $id)->get();
    return view('usuariomiig::generador')->with('representantes',$representantes);
});

});


Route::group(['middleware' => ['auditor']], function (){


Route::get('/configuracion', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@configuracion');

Route::post('/configuracionupdate', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@configuracionupdate');

Route::get('/carga-esseg', function () {
 $datos = DB::table('colegios')
 ->join('esseg_con', 'colegios.id', '=', 'esseg_con.colegio_id')
 ->select(
                  'colegios.nombres',
                  'esseg_con.miig',
                  'esseg_con.valor',
                  'esseg_con.identificador',
                  'esseg_con.id'
                
          )
 ->get();

 return view('usuariomiig::cargaesseg',compact('datos'));    
});





Route::post('/editar-descuentos/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editardescuentowebsite');

Route::get('/carga-descuento', function () {
 $descuentos = DB::table('descuentos')->get();
 return view('usuariomiig::cargadescuento',compact('descuentos'));    
});

Route::get('/carga-essegreg', function () {
$ano = DB::table('configuracion')->where('id', '=', 1)->get();
    foreach($ano as $anoes){
 $datos = DB::table('colegios')
 ->join('esseg_con','colegios.id','=','esseg_con.colegio_id')
  ->join('esseg','colegios.id','=','esseg.colegio_id')
 ->where('esseg.ano','=',$anoes->ano)
 ->where('esseg_con.ano','=',$anoes->ano)
 ->get();
 $consumido = DB::table('esseg_con')->where('ano','=',$anoes->ano)->get();
}
 $colegio  = DB::table('colegios')->get();
 return view('usuariomiig::cargaessegreg',compact('datos','colegio','ano','consumido'));    
});

Route::get('/editar-esseg/{id}', function ($id) {
    $esseg = DB::table('esseg_con')->where('id', '=', $id)->get();
    return view('usuariomiig::editaresseg',compact('esseg'));    
});


Route::get('/editar-essegreg/{id}', function ($id) {
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    foreach($ano as $anoes){
    $esseg = DB::table('esseg')->where('id', '=', $id)->get();
    }
    return view('usuariomiig::editaressegreg',compact('esseg'));    
});



  


Route::post('/editaressegcolregcol/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@editaressegcolregcol');
Route::post('/editaressegcol/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@editaressegcol');

Route::get('excel-esseg', function () {
    return view('colegiomiig::ImportExportEsseg');
});

Route::get('exportador-esseg/{type}', 'Digitalmiig\Colegiomiig\Controllers\EssegController@exportador');
Route::post('importador-esseg', 'Digitalmiig\Colegiomiig\Controllers\EssegController@importador');
Route::post('importador-esseg', 'Digitalmiig\Colegiomiig\Controllers\EssegController@importador');
Route::get('eliminar-esseg', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@eliminaresseg');

});

// Rol Asistente

Route::group(['middleware' => ['representante']], function (){

Route::get('/filtro-representante', function () {
    return view('colegiomiig::filtro-representante');
});


Route::get('/colegio-descuento/{id}', function ($id) {
    $descuentos = DB::table('descuento')->where('colegio_id', '=', $id)->get();
    $ano = DB::table('configuracion')->where('id','=',1)->get();
    $anos = DB::table('configuracion')->where('id','=',1)->get();
     $valores = DB::table('descuentos')->where('id', '=', 1)->get();
    return view('colegiomiig::descuento')->with('descuentos', $descuentos)->with('ano', $ano)->with('anos', $anos)->with('valores', $valores);
});




Route::get('/editar-descuento/{id}', function ($id) {
    $descuentos = DB::table('descuento')->where('id', '=', $id)->get();
    return view('colegiomiig::editar-descuento')->with('descuentos', $descuentos);
});

Route::get('/eliminar-descuento/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@eliminardescuento');
Route::post('/creardescuento', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@createdescuento');
Route::post('/editardescuento/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@editardescuento');

Route::get('/editar-colegiorp/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@edicion');
Route::post('/update-colegiojr/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@updatejr');
Route::get('/colegios/auditores/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@colegioauditores');
Route::get('/poblacion-registrada/{id}', 'Digitalmiig\Colegiomiig\Controllers\PoblacionesController@show');
Route::post('/crearfecha', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@createfecha');
Route::post('/actualizarfecha/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@updatefecha');


Route::post('/crearfechameta', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@createfechameta');
Route::post('/actualizarfechameta/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@updatefechameta');
Route::post('/updatefecha/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@updatefetch');

Route::get('/colegio-poblacion/{id}', function ($id) {
 date_default_timezone_set('America/Bogota');
 $date = date('Y');
 $ano =  DB::table('configuracion')->where('id', '=', 1)->get();
 $datos = DB::table('datos')->where('colegio_id', $id)->get();
 $data = DB::table('datos')->where('colegio_id', $id)->where('ano', $date)->exists();
 return view('colegiomiig::crear-mercado')->with('data', $data)->with('date', $date)->with('datos', $datos)->with('ano', $ano);
});
Route::post('/poblaciones', 'Digitalmiig\Colegiomiig\Controllers\PoblacionesController@create');
Route::get('/editar-poblacion/{id}', 'Digitalmiig\Colegiomiig\Controllers\PoblacionesController@edit');
Route::post('/update-mercado/{id}', 'Digitalmiig\Colegiomiig\Controllers\PoblacionesController@update');





Route::get('/asistente-representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@representantes');
Route::get('/colegios-region', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@region');
Route::get('/colegios-regioncid/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@regionciudad');
Route::get('/asistente-ciudades', 'Digitalmiig\Colegiomiig\Controllers\CiudadesController@index');




Route::get('editar-gradoweb/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargrado');
Route::get('editar-gradoweb-segundo/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosegundo');
Route::get('editar-gradoweb-tercero/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradotercero');
Route::get('editar-gradoweb-cuarto/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradocuarto');
Route::get('editar-gradoweb-quinto/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoquinto');
Route::get('editar-gradoweb-sexto/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosexto');
Route::get('editar-gradoweb-septimo/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoseptimo');
Route::get('editar-gradoweb-octavo/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradooctavo');
Route::get('editar-gradoweb-noveno/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradonoveno');
Route::get('editar-gradoweb-decimo/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradodecimo');
Route::get('editar-gradoweb-once/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoonce');


Route::get('editar-gradowebasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoasi');
Route::get('editar-gradoweb-segundoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosegundoasi');
Route::get('editar-gradoweb-terceroasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoterceroasi');
Route::get('editar-gradoweb-cuartoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradocuartoasi');
Route::get('editar-gradoweb-quintoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoquintoasi');
Route::get('editar-gradoweb-sextoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosextoasi');
Route::get('editar-gradoweb-septimoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoseptimoasi');
Route::get('editar-gradoweb-octavoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradooctavoasi');
Route::get('editar-gradoweb-novenoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradonovenoasi');
Route::get('editar-gradoweb-decimoasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradodecimoasi');
Route::get('editar-gradoweb-onceasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoonceasi');

Route::post('editar-proventaadopcionasi/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editarproventawebadopcionasi');
Route::post('editar-proventa/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editarproventaweb');
Route::post('editar-proventaadopcion/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editarproventawebadopcion');


  Route::post('/editarproventaw', function(){


DB::table('proventas')
            ->where('id', 1)
            ->update(array('colegio_id' => Input::get('colegio'),'grado_id' => Input::get('subcategory'),'region_id' => Input::get('region'),'representante_id' => Input::get('representante'),'ano' => Input::get('ano'),'pr_matematicas' => Input::get('pr_matematicas'),'pr_titulo_mat' => Input::get('pr_titulo_mat'),'pr_espanol' => Input::get('pr_espanol'),'pr_titulo_esp' => Input::get('pr_titulo_esp'),'pr_ciencias' => Input::get('pr_ciencias'),'pr_titulo_cie' => Input::get('pr_titulo_cie'),'pr_comprension' => Input::get('pr_comprension'),'pr_titulo_com' => Input::get('pr_titulo_com'),'pr_interes' => Input::get('pr_interes'),'pr_titulo_int' => Input::get('pr_titulo_int'),'pr_artistica' => Input::get('pr_artistica'),'pr_titulo_art' => Input::get('pr_titulo_art'),'pr_ingles' => Input::get('pr_ingles'),'pr_titulo_ing' => Input::get('pr_titulo_ing')));



return Redirect('gestion/factura/crear-producto')->with('status', 'ok_create');

    });



Route::get('/representante', function () {
    return view('usuariomiig::asistente');
});

Route::get('/colegios-asignados/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@colegios');


Route::get('proyeccionventas/{id}', function ($id) {
    $colegios = DB::table('colegios')->where('id',$id)->get();
    $proventas = DB::table('proventas')->where('colegio_id', '=', $id)->get();
    $proventasf = DB::table('proventas')->where('colegio_id', '=', $id)->get();
    $proventasprimero = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 1)->select('id')->orderBy('id', 'DESC')->first();   
    $proventassegundo = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 2)->select('id')->orderBy('id', 'DESC')->first();   
    $proventastercero = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 3)->select('id')->orderBy('id', 'DESC')->first();
    $proventascuarto = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 4)->select('id')->orderBy('id', 'DESC')->first();
    $proventasquinto = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 5)->select('id')->orderBy('id', 'DESC')->first();
    $proventassexto = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 6)->select('id')->orderBy('id', 'DESC')->first();
    $proventasseptimo = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 7)->select('id')->orderBy('id', 'DESC')->first();
    $proventasoctavo = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 8)->select('id')->orderBy('id', 'DESC')->first();
    $proventasnoveno = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 9)->select('id')->orderBy('id', 'DESC')->first();
    $proventasdecimo = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 10)->select('id')->orderBy('id', 'DESC')->first();
    $proventasonce = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 11)->select('id')->orderBy('id', 'DESC')->first();
    $anoesma = DB::table('configuracion')->where('id', '=', 1)->get();
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoweb = DB::table('configuracion')->where('id', '=', 1)->get();
    $anon = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoe = DB::table('configuracion')->where('id', '=', 1)->get();
    $esseg = DB::table('esseg')->where('colegio_id', '=', $id)->get();
    $identificador = DB::table('proventas')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
    $identificadores = DB::table('proventas')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
    foreach($ano as $anoes){
    
         $fecha = DB::table('fecha_meta')->where('ano','=', $anoes->ano)->where('colegio_id','=',$id)->get();   
        $matematicas = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($matematicas as $matematicasweb){
         $matematicaswebsd = $matematicasweb->vender_mat;
        }

        $ciencias = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($ciencias as $cienciasweb){
         $cienciaswebsd = $cienciasweb->vender_cie;
        }

        $espanol = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($espanol as $espanolweb){
         $espanolwebsd = $espanolweb->vender_esp;
        }

        $comprension = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($comprension as $comprensionweb){
         $comprensionwebsd = $comprensionweb->vender_com;
        }

        $interes = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($interes as $interesweb){
         $intereswebsd = $interesweb->vender_int;
        }

        $artistica = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($artistica as $artisticaweb){
         $artisticawebsd = $artisticaweb->vender_art;
        }

        $ingles = DB::table('proventas')
        ->select(DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($ingles as $inglesweb){
         $ingleswebsd = $inglesweb->vender_ing;
        }
        }

        $total = $cienciaswebsd+$matematicaswebsd+$espanolwebsd+$comprensionwebsd+$intereswebsd+$artisticawebsd+$ingleswebsd;
        $totalazo = $total*10/100;

        $ajusteesseg = DB::table('esseg')->where('colegio_id','=',$id)->get();

        $cierre = DB::table('cierre')->where('colegio_id','=',$id)->get();
        
        foreach ($cierre as $cierre) {
            $cierremet = $cierre->cierre;
            if($cierremet == 1){

            }
       
       else{
        foreach ($ajusteesseg as $ajusteesseg) {
            $essegdit = $ajusteesseg->esseg;

            if($totalazo < $ajusteesseg->esseg){
            $borrar = DB::table('esseg')->where('colegio_id', '=', $id)->delete();
        }
        else{
          
        }

        }
        }

        }

    return view('usuariomiig::proyecciongrados', compact('proventas','proventasf','proventasprimero','proventassegundo','proventastercero','proventascuarto','proventasquinto','proventassexto','proventasseptimo','proventasoctavo','proventasnoveno','proventasdecimo','proventasonce','proventasonce','ano','identificador','anon','anoe','identificadores','total','esseg','anoweb','fecha','anoesma','colegios'));

});





Route::get('grado-primero/{id}', function ($id) {
   $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $adopciones = DB::table('adopciones')->where('id', '=', 1)->get();
   $region = Digitalmiig\Colegiomiig\Colegio::find($id);
   $date = DB::table('configuracion')->where('id', '=', 1)->get();
   $proventas = DB::table('proventas')
   ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
   ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoprimero', compact('titulo','titulof','region','date','proventas','adopciones'));
});


Route::get('grado-segundo/{id}', function ($id) {
   $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
    ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
    ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosegundo', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-tercero/{id}', function ($id) {
     $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradotercero', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-cuarto/{id}', function ($id) {
  $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradocuarto', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-quinto/{id}', function ($id) {
    $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('campos')
        ->join('titulo', 'titulo.id', '=', 'campos.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoquinto', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-sexto/{id}', function ($id) {
    $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosexto', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-septimo/{id}', function ($id) {
    $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoseptimo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-octavo/{id}', function ($id) {
  $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradooctavo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-noveno/{id}', function ($id) {
   $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradonoveno', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-decimo/{id}', function ($id) {
  $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradodecimo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-once/{id}', function ($id) {
    $titulo = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
   $titulof = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoonce', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-primeroadopcion/{id}', function ($id) {
    $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
    $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoprimeroadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});


Route::get('grado-segundoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
      $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosegundoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});





Route::get('grado-terceroadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoterceroadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});


Route::get('grado-cuartoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradocuartoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});


Route::get('grado-quintoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('campos')
        ->join('titulo', 'titulo.id', '=', 'campos.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoquintoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-sextoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosextoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-septimoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoseptimoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-octavoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
      $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradooctavoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-novenoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradonovenoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-decimoadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradodecimoadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('grado-onceadopcion/{id}', function ($id) {
       $titulomet = DB::table('colegios')
   ->join('titulo','colegios.adopcion', '=', 'titulo.portafolio')->where('colegios.id', '=', $id)->get();
       $colegios = DB::table('colegios')->where('id', "=", $id)->get();
    $titulo = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoonceadopcion', compact('titulo','titulof','region','date','proventas','colegios','titulomet'));
});

Route::get('proyeccionventasadopcion/{id}', function ($id) {

    return view('usuariomiig::proyeccionforms');
});



Route::get('proyeccionventaseee/{id}', function ($id) {
    $asignaturas = DB::table('datos')->where('colegio_id', '=', $id)->get();
    $categories = Digitalmiig\Titulomiig\Grado::all();
    $grados = DB::table('grados')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $data = DB::table('campos')->where('colegio_id', $id)->whereIn('grado_id', [1, 2, 3])->exists();
    $visuales = Digitalmiig\Colegiomiig\Colegio::find($id);
    $titulo = DB::table('titulo')->get();
    $colegios = DB::table('colegios')->where('id','=',$id)->get();
    $editorial = DB::table('editoriales')->get();
    $areas = DB::table('colegios')->get();
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $ano =  DB::table('configuracion')->where('id', '=', 1)->get();
    $titulosa = DB::table('proventas')
    ->join('titulo', 'titulo.id', '=', 'proventas.titulo')->get();

    return view('usuariomiig::proyeccion-ventas')->with('grados', $grados)->with('data', $data)->with('editorial', $editorial)->with('editoriala', $editorial)->with('editorialb', $editorial)->with('editorialc', $editorial)->with('editoriald', $editorial)->with('editoriale', $editorial)->with('editorialf', $editorial)->with('region', $region)->with('categories', $categories)->with('colegios', $colegios)->with('visuales', $visuales)->with('titulo', $titulo)->with('titulof', $titulo)->with('titulosa', $titulosa)->with('titulosaf', $titulosa)->with('areas', $areas)->with('asignaturas', $asignaturas)->with('date', $date)->with('ano', $ano);
});





Route::get('proyeccionventasedit/{id}', function ($id) {
    $asignaturas = DB::table('datos')->where('colegio_id', '=', $id)->get();
    $categories = Digitalmiig\Titulomiig\Grado::all();
    $grados = DB::table('grados')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $data = DB::table('campos')->where('colegio_id', $id)->whereIn('grado_id', [1, 2, 3])->exists();
    $visuales = Digitalmiig\Colegiomiig\Colegio::find($id);
    $titulo = DB::table('titulo')->get();
    $tituloweb = DB::table('titulo')->get();
    $colegios = DB::table('colegios')->where('id','=',$id)->get();
    $editorial = DB::table('editoriales')->get();
    $areas = DB::table('colegios')->get();
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $data = DB::table('configuracion')->where('id', '=', 1)->get();
    $ano =  DB::table('configuracion')->where('id', '=', 1)->get();
    $titulosa = DB::table('proventas')->get();
    $titulosam = DB::table('proventas')->get();
    $nombretitulo = DB::table('proventas')
    ->join('titulo', 'titulo.id', '=', 'proventas.titulo')->get();

     $nombretituloweb = DB::table('proventas')
    ->join('titulo', 'titulo.id', '=', 'proventas.titulo')->get();

    return view('usuariomiig::proyeccion-ventasedit')->with('grados', $grados)->with('data', $data)->with('editorial', $editorial)->with('editoriala', $editorial)->with('editorialb', $editorial)->with('editorialc', $editorial)->with('editoriald', $editorial)->with('editoriale', $editorial)->with('editorialf', $editorial)->with('region', $region)->with('categories', $categories)->with('colegios', $colegios)->with('visuales', $visuales)->with('titulo', $titulo)->with('titulof', $titulo)->with('titulosa', $titulosa)->with('titulosaf', $titulosa)->with('areas', $areas)->with('asignaturas', $asignaturas)->with('date', $date)->with('ano', $ano)->with('tituloweb', $tituloweb)->with('nombretitulo', $nombretitulo)->with('nombretitulof', $nombretitulo)->with('titulosam', $titulosam)->with('titulosad', $titulosa)->with('datef', $data);
});

Route::post('/crearproventaco', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventaweb');



Route::post('/crearproventaadopcioncor', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventawebadopcion');

});

Route::get('/usuario/ajax-subcat',function(){

        $cat_id = Input::get('cat_id');
        $subcategories = Digitalmiig\Colegiomiig\Ciudad::where('region_id', '=', $cat_id)->get();
        return Response::json($subcategories);
});






Route::group(['middleware' => ['representante']], function (){

    Route::get('/editar-descuentorep/{id}', function ($id) {
    $descuentos = DB::table('descuento')->where('id', '=', $id)->get();
     $valores = DB::table('descuentos')->where('id', '=', 1)->get();
    return view('colegiomiig::editar-descuento')->with('descuentos', $descuentos)->with('valores', $valores);
});





    Route::get('/informe/representantes', function () {
  
  $ano = Input::get('ano');

        $representantes = DB::table('users')
        ->where('id', '=', Auth::user()->id)
        ->get();



    
$now = new \DateTime();
$fechafin = $now->format('Y-m-d');

        $data = DB::table("colegios")->join('fecha_meta','colegios.id','=','fecha_meta.colegio_id')->where('fecha' ,'<', $fechafin)->count();


        $date = date("Y-m-d");
        $date_future = strtotime('+15 day', strtotime($date));
        $date_future = date('Y-m-d', $date_future);

        $colegios = DB::table('colegios')
        ->select(
                  'id',
                  'nombres',
                  'codigo'
          )
        ->where('representante_id', '=', Auth::user()->id)
        ->get();

        





        $diferenciameta = DB::table('proventas')
         ->select(DB::raw('(pr_titulo_mat) as titulo_mat'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'), 
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_met'),
         DB::raw('sum(pr_muestra_mat+pr_muestra_esp+pr_muestra_cie+pr_muestra_com+pr_muestra_int+pr_muestra_ing+pr_muestra_art) as total_muestramet'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_metval'),
         DB::raw('colegio_id as colegio_id'),
        DB::raw('ano as ano'))
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id)
        ->groupBy('colegio_id')

        ->get();

         $diferenciaadopcion = DB::table('campos')
         ->select(DB::raw('(pr_titulo_mat) as titulo_mat'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'), 
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_met'),
         DB::raw('sum(pr_muestra_mat+pr_muestra_esp+pr_muestra_cie+pr_muestra_com+pr_muestra_int+pr_muestra_ing+pr_muestra_art) as total_muestramet'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_metval'),
         DB::raw('colegio_id as colegio_id'),
        DB::raw('ano as ano'))
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id)
        ->groupBy('colegio_id')

        ->get();


        $informes = DB::table('proventas')
        ->select(DB::raw('(pr_titulo_mat) as titulo_mat'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'), 
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_met'),
         DB::raw('sum(pr_muestra_mat+pr_muestra_esp+pr_muestra_cie+pr_muestra_com+pr_muestra_int+pr_muestra_ing+pr_muestra_art) as total_muestramet'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_metval'),
         DB::raw('colegio_id as colegio_id'),
        DB::raw('ano as ano'))
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id)
        ->groupBy('colegio_id')

        ->get();
      
   


          $informestotales = DB::table('proventas')
        ->select(DB::raw('(pr_titulo_mat) as titulo_mat'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'), 
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_met'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_metval'),
          DB::raw('ano as ano'))
        ->where('ano','=',$ano)
         ->groupBy('representante_id')
         ->where('representante_id','=',Auth::user()->id)

        ->get();

    

        $informesadopcion = DB::table('campos')
        ->select(DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'),
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_adop'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_adopval'),
         DB::raw('colegio_id as colegio_id'),
         DB::raw('ano as ano'))
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id) 
        ->groupBy('colegio_id')

        ->get();






          $presupuestomet = DB::table('proventas')
        ->select(DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('colegio_id as colegio_id'),
         DB::raw('ano as ano'))
        ->where('ano','=',$ano)
         ->where('representante_id','=',Auth::user()->id) 
        ->get();


          $presupuestoadop = DB::table('campos')
        ->select(DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_muestra_mat+pr_muestra_esp+pr_muestra_cie+pr_muestra_com+pr_muestra_int+pr_muestra_ing+pr_muestra_art) as total_adop'),
         DB::raw('colegio_id as colegio_id'),
         DB::raw('ano as ano'))
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id) 
        ->get();

      
       




          $informesadopciontotales = DB::table('campos')
        ->select(DB::raw('sum(pr_vender_mat*pr_valor_mat) as vender_mat'),
         DB::raw('sum(pr_vender_esp*pr_valor_esp) as vender_esp'),
         DB::raw('sum(pr_vender_cie*pr_valor_cie) as vender_cie'),
         DB::raw('sum(pr_vender_com*pr_valor_com) as vender_com'),
         DB::raw('sum(pr_vender_int*pr_valor_int) as vender_int'),
         DB::raw('sum(pr_vender_ing*pr_valor_ing) as vender_ing'),
         DB::raw('sum(pr_vender_art*pr_valor_art) as vender_art'),
         DB::raw('sum(pr_vender_mat) as suma_mat'),
         DB::raw('sum(pr_vender_esp) as suma_esp'),
         DB::raw('sum(pr_vender_cie) as suma_cie'),
         DB::raw('sum(pr_vender_com) as suma_com'),
         DB::raw('sum(pr_vender_int) as suma_int'),
         DB::raw('sum(pr_vender_ing) as suma_ing'),
         DB::raw('sum(pr_vender_art) as suma_art'),
         DB::raw('sum(pr_muestra_mat) as muestra_mat'),
         DB::raw('sum(pr_muestra_esp) as muestra_esp'),
         DB::raw('sum(pr_muestra_cie) as muestra_cie'),
         DB::raw('sum(pr_muestra_com) as muestra_com'),
         DB::raw('sum(pr_muestra_int) as muestra_int'),
         DB::raw('sum(pr_muestra_ing) as muestra_ing'),
         DB::raw('sum(pr_muestra_art) as muestra_art'),
         DB::raw('sum(pr_vender_mat+pr_vender_esp+pr_vender_cie+pr_vender_com+pr_vender_int+pr_vender_ing+pr_vender_art) as total_adop'),
         DB::raw('sum(pr_vender_mat*pr_valor_mat+pr_vender_esp*pr_valor_esp+pr_vender_cie*pr_valor_cie+pr_vender_com*pr_valor_com+pr_vender_int*pr_valor_int+pr_vender_ing*pr_valor_ing+pr_vender_art*pr_valor_art) as total_adopval'),
         DB::raw('representante_id as representante_id'),
         DB::raw('ano as ano'))
        ->groupBy('representante_id')
        ->where('ano','=',$ano)
        ->where('representante_id','=',Auth::user()->id) 
        ->get();




        $date = date('Y-m-d');
        //convertimos la fecha 1 a objeto Carbon
$carbon1 = new \Carbon\Carbon($date);
//convertimos la fecha 2 a objeto Carbon
$carbon2 = new \Carbon\Carbon("2010-02-02 00:00:00");
//de esta manera sacamos la diferencia en minutos
$minutesDiff=$carbon1->diffInDays($carbon2);




        $fechameta = DB::table('fecha_meta')->get();



        $fechaadopcion = DB::table('fecha_adopcion')
    ->select(DB::raw('*, max(fecha) as fechaguard'))
    ->groupBy('colegio_id')
    ->orderBy('fecha', 'asc')
    ->get();


       





        $esseg = DB::table('esseg')
        ->where('ano','=',$ano)
         ->where('representante_id','=',Auth::user()->id) 
         ->get();


        $essegcon = DB::table('esseg_con')
        ->where('ano','=',$ano)
         ->where('representante_id','=',Auth::user()->id) 
        ->get();





 if(DB::table('proventas')->where('ano','=',$ano)->first()){
         return view('usuariomiig::informes', compact('informesweb','informesmat','informesesp','titulos','informeswebadop','representantes','colegios','informes','informesadopcion','fechameta','fechaadopcion','esseg','essegcon','date','masa','informesadopcion','informestotales','informesadopciontotales','presupuestomet','presupuestoadop','colegiosman','date','date_future','diferenciameta','diferenciaadopcion'));
}
    else{
 return view('colegiomiig::respuesta-filtro');

}

});

Route::post('/crearesseg', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createsseg');
Route::post('/updateesseg/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@updateesseg');





Route::get('proyeccionventasadopcion/{id}', function ($id) {
    $colegios = DB::table('colegios')->where('id',$id)->get();
    $proventas = DB::table('campos')->where('colegio_id', '=', $id)->get();
    $proventasf = DB::table('campos')->where('colegio_id', '=', $id)->get();
    $proventasprimero = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 1)->select('id')->orderBy('id', 'DESC')->first();   
    $proventassegundo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 2)->select('id')->orderBy('id', 'DESC')->first();   
    $proventastercero = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 3)->select('id')->orderBy('id', 'DESC')->first();
    $proventascuarto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 4)->select('id')->orderBy('id', 'DESC')->first();
    $proventasquinto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 5)->select('id')->orderBy('id', 'DESC')->first();
    $proventassexto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 6)->select('id')->orderBy('id', 'DESC')->first();
    $proventasseptimo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 7)->select('id')->orderBy('id', 'DESC')->first();
    $proventasoctavo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 8)->select('id')->orderBy('id', 'DESC')->first();
    $proventasnoveno = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 9)->select('id')->orderBy('id', 'DESC')->first();
    $proventasdecimo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 10)->select('id')->orderBy('id', 'DESC')->first();
    $proventasonce = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 11)->select('id')->orderBy('id', 'DESC')->first();
    $ventas = DB::table('colegios')
    ->join('esseg_con','esseg_con.miig','=','colegios.codigo')
    ->where('colegios.id','=',$id)
    ->get();
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoweb = DB::table('configuracion')->where('id', '=', 1)->get();
    $anon = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoe = DB::table('configuracion')->where('id', '=', 1)->get();
    $esseg = DB::table('esseg')->where('colegio_id', '=', $id)->get();
    $identificador = DB::table('campos')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
    $identificadores = DB::table('campos')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
     foreach($ano as $anoes){
    
        $fecha = DB::table('fecha_adopcion')->where('ano','=', $anoes->ano)->where('colegio_id','=',$id)->orderby('fecha','DESC')->take(1)->get();

        $matematicas = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_mat')
        ->select(DB::raw('sum(pr_vender_mat*precio) as vender_mat'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($matematicas as $matematicasweb){
         $matematicaswebsd = $matematicasweb->vender_mat;
        }


        $ciencias = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_cie')
        ->select(DB::raw('sum(pr_vender_cie*precio) as vender_cie'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($ciencias as $cienciasweb){
         $cienciaswebsd = $cienciasweb->vender_cie;
        }

        $espanol = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_esp')
        ->select(DB::raw('sum(pr_vender_esp*precio) as vender_esp'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($espanol as $espanolweb){
         $espanolwebsd = $espanolweb->vender_esp;
        }

        $comprension = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_com')
        ->select(DB::raw('sum(pr_vender_com*precio) as vender_com'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($comprension as $comprensionweb){
         $comprensionwebsd = $comprensionweb->vender_com;
        }

        $interes = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_int')
        ->select(DB::raw('sum(pr_vender_int*precio) as vender_int'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($interes as $interesweb){
         $intereswebsd = $interesweb->vender_int;
        }

        $artistica = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_art')
        ->select(DB::raw('sum(pr_vender_art*precio) as vender_art'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($artistica as $artisticaweb){
         $artisticawebsd = $artisticaweb->vender_art;
        }

        $ingles = DB::table('titulo')
        ->join('campos','titulo.id','=','campos.pr_titulo_ing')
        ->select(DB::raw('sum(pr_vender_ing*precio) as vender_ing'))
        ->where('colegio_id', '=', $id)
        ->where('ano', '=', $anoes->ano)
        ->get();
        foreach($ingles as $inglesweb){
         $ingleswebsd = $inglesweb->vender_ing;
        }
        }
         
        $total = $cienciaswebsd+$matematicaswebsd+$espanolwebsd+$comprensionwebsd+$intereswebsd+$artisticawebsd+$ingleswebsd;
    return view('usuariomiig::proyecciongradosadopcion', compact('proventas','proventasf','proventasprimero','proventassegundo','proventastercero','proventascuarto','proventasquinto','proventassexto','proventasseptimo','proventasoctavo','proventasnoveno','proventasdecimo','proventasonce','proventasonce','ano','identificador','anon','anoe','identificadores','total','esseg','fecha','anoweb','ventas','colegios'));

});
});

Route::group(['middleware' => ['auditorjr']], function (){

    Route::get('proyeccion/{id}', function ($id) {
    $represen = DB::table('colegios')->where('id', '=', $id)->get();
    $fechas =  DB::table('proyeccion')->where('colegio_id', $id)->orderBy('id', 'asc')->get();
    $conteo = DB::table('proyeccion')->where('colegio_id', $id)->count();
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    return view('colegiomiig::proyeccion')->with('fechas', $fechas)->with('conteo', $conteo)->with('represen', $represen)->with('ano', $ano);
});

Route::get('proyeccionventasadopcionaud/{id}', function ($id) {
   
    $proventas = DB::table('campos')->where('colegio_id', '=', $id)->get();
    $proventasf = DB::table('campos')->where('colegio_id', '=', $id)->get();
    $proventasprimero = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 1)->select('id')->orderBy('id', 'DESC')->first();   
    $proventassegundo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 2)->select('id')->orderBy('id', 'DESC')->first();   
    $proventastercero = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 3)->select('id')->orderBy('id', 'DESC')->first();
    $proventascuarto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 4)->select('id')->orderBy('id', 'DESC')->first();
    $proventasquinto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 5)->select('id')->orderBy('id', 'DESC')->first();
    $proventassexto = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 6)->select('id')->orderBy('id', 'DESC')->first();
    $proventasseptimo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 7)->select('id')->orderBy('id', 'DESC')->first();
    $proventasoctavo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 8)->select('id')->orderBy('id', 'DESC')->first();
    $proventasnoveno = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 9)->select('id')->orderBy('id', 'DESC')->first();
    $proventasdecimo = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 10)->select('id')->orderBy('id', 'DESC')->first();
    $proventasonce = DB::table('campos')->where('colegio_id', '=', $id)->where('grado_id', '=', 11)->select('id')->orderBy('id', 'DESC')->first();
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    $anon = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoe = DB::table('configuracion')->where('id', '=', 1)->get();
    $identificador = DB::table('campos')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
    return view('usuariomiig::proyecciongradosadopcionaud', compact('proventas','proventasf','proventasprimero','proventassegundo','proventastercero','proventascuarto','proventasquinto','proventassexto','proventasseptimo','proventasoctavo','proventasnoveno','proventasdecimo','proventasonce','proventasonce','ano','identificador','anon','anoe'));

});



Route::get('editar-gradowebaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoaud');
Route::get('editar-gradoweb-segundoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosegundoaud');
Route::get('editar-gradoweb-terceroaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoterceroaud');
Route::get('editar-gradoweb-cuartoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradocuartoaud');
Route::get('editar-gradoweb-quintoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoquintoaud');
Route::get('editar-gradoweb-sextoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradosextoaud');
Route::get('editar-gradoweb-septimoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoseptimoaud');
Route::get('editar-gradoweb-octavoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradooctavoaud');
Route::get('editar-gradoweb-novenoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradonovenoaud');
Route::get('editar-gradoweb-decimoaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradodecimoaud');
Route::get('editar-gradoweb-onceaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editargradoonceaud');





Route::get('grado-primeroadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoprimeroadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});


Route::get('grado-segundoadopcionaud/{id}', function ($id) {
     $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosegundoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});


Route::get('grado-terceroadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoterceroadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});


Route::get('grado-cuartoadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradocuartoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});


Route::get('grado-quintoadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
    return view('usuariomiig::gradoquintoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-sextoadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosextoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-septimoadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoseptimoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-octavoadopcionaud/{id}', function ($id) {
  $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradooctavoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-novenoadopcionaud/{id}', function ($id) {
     $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
    return view('usuariomiig::gradonovenoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-decimoadopcionaud/{id}', function ($id) {
     $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
    return view('usuariomiig::gradodecimoadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});

Route::get('grado-onceadopcionaud/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $editorial = DB::table('editoriales')->get();
    $editoriala = DB::table('editoriales')->get();
    $editorialb = DB::table('editoriales')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoonceadopcionaud', compact('titulo','titulof','region','date','proventas','editorial','editoriala','editorialb'));
});





Route::post('editar-proventaadopcionaud/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@editarproventawebadopcionaud');

Route::post('/crearproventaadopcionaud', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventawebadopcionaud');


});