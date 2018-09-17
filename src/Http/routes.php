<?php

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


Route::post('login', function(){

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
        return Redirect::to('/asistente');
    }
    elseif (Auth::user()->rol_id == 6) {
        return Redirect::to('/vendedor');
    }
    return Redirect::to('/');
});

Route::group(['middleware' => ['auditor']], function (){
Route::get('/usuarios', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@index');

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

Route::get('/representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@index');

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
});

// Rol Asistente

Route::group(['middleware' => ['asistente']], function (){

Route::get('/asistente-representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@representantes');
Route::get('/colegios-region', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@region');
Route::get('/colegios-regioncid/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@regionciudad');
Route::get('/asistente-ciudades', 'Digitalmiig\Colegiomiig\Controllers\CiudadesController@index');




Route::post('actualizarcierrecolegio/{id}', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@actucolegio');
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



Route::get('/asistente', function () {
    return view('usuariomiig::asistente');
});

Route::get('/colegios-asignados/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@colegios');


Route::get('proyeccionventas/{id}', function ($id) {
   
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
    $proventasonce = DB::table('proventas')->where('colegio_id', '=', $id)->where('grado_id', '=', 11)->orderBy('id', 'DESC')->first();
    $ano = DB::table('configuracion')->where('id', '=', 1)->get();
    $anon = DB::table('configuracion')->where('id', '=', 1)->get();
    $anoe = DB::table('configuracion')->where('id', '=', 1)->get();
    $identificador = DB::table('proventas')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
     $identificadores = DB::table('proventas')->where('colegio_id', '=', $id)->select('id')->orderBy('id', 'DESC')->first();
    return view('usuariomiig::proyecciongrados', compact('proventas','proventasf','proventasprimero','proventassegundo','proventastercero','proventascuarto','proventasquinto','proventassexto','proventasseptimo','proventasoctavo','proventasnoveno','proventasdecimo','proventasonce','proventasonce','ano','identificador','anon','anoe','identificadores'));

});





Route::get('grado-primero/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $adopciones = DB::table('adopciones')->where('id', '=', 1)->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoprimero', compact('titulo','titulof','region','date','proventas','adopciones'));
});


Route::get('grado-segundo/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosegundo', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-tercero/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradotercero', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-cuarto/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradocuarto', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-quinto/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('campos')
        ->join('titulo', 'titulo.id', '=', 'campos.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoquinto', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-sexto/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosexto', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-septimo/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoseptimo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-octavo/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradooctavo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-noveno/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradonoveno', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-decimo/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradodecimo', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-once/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoonce', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-primeroadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoprimeroadopcion', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-segundoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosegundoadopcion', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-terceroadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoterceroadopcion', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-cuartoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradocuartoadopcion', compact('titulo','titulof','region','date','proventas'));
});


Route::get('grado-quintoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('campos')
        ->join('titulo', 'titulo.id', '=', 'campos.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoquintoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-sextoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradosextoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-septimoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoseptimoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-octavoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradooctavoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-novenoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradonovenoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-decimoadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradodecimoadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('grado-onceadopcion/{id}', function ($id) {
    $titulo = DB::table('titulo')->get();
    $titulof = DB::table('titulo')->get();
    $region = Digitalmiig\Colegiomiig\Colegio::find($id);
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $proventas = DB::table('proventas')
        ->join('titulo', 'titulo.id', '=', 'proventas.pr_titulo_mat')
        ->where('colegio_id', '=', $id)->get();
                         
    return view('usuariomiig::gradoonceadopcion', compact('titulo','titulof','region','date','proventas'));
});

Route::get('proyeccion-grado/{id}', function ($id) {

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

Route::post('/crearproventa', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventaweb');

Route::post('/crearproventaadopcion', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventawebadopcion');

});

Route::get('/usuario/ajax-subcat',function(){

        $cat_id = Input::get('cat_id');
        $subcategories = Digitalmiig\Colegiomiig\Ciudad::where('region_id', '=', $cat_id)->get();
        return Response::json($subcategories);
});


Route::group(['middleware' => ['asistente']], function (){

Route::get('proyeccionventasadopcion/{id}', function ($id) {
   
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
    return view('usuariomiig::proyecciongradosadopcion', compact('proventas','proventasf','proventasprimero','proventassegundo','proventastercero','proventascuarto','proventasquinto','proventassexto','proventasseptimo','proventasoctavo','proventasnoveno','proventasdecimo','proventasonce','proventasonce','ano','identificador','anon','anoe'));

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