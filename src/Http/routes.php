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


Route::get('/usuarios', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@index');

Route::post('/crearusuario', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@create');

Route::get('/crear-usuario', function () {
    $rols = DB::table('rols')->get();
    $regiones = DB::table('regiones')->get();
    return view('usuariomiig::crear-usuario')->with('rols', $rols)->with('regiones', $regiones);
});

Route::get('/editar-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@edit');

Route::post('/update-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@update');

Route::get('/eliminar-usuario/{id}', 'Digitalmiig\Usuariomiig\Controllers\UsuariosController@destroy');







Route::get('/representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@index');

Route::get('/crear-representante', function () {
    $categories = Digitalmiig\Usuariomiig\Region::all();
    return view('usuariomiig::crear-representante')->with('categories', $categories);
});

Route::post('/crearrepresentante', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@create');

Route::get('/editar-representante/{id}', function ($id) {
    $categories = App\Region::all();
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






Route::get('/configuracion', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@configuracion');

Route::post('/configuracionupdate', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@configuracionupdate');



// Rol Asistente

Route::group(['middleware' => ['asistente']], function (){

Route::get('/asistente-representantes', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@representantes');
Route::get('/colegios-region', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@region');
Route::get('/asistente-ciudades', 'Digitalmiig\Colegiomiig\Controllers\CiudadesController@index');
});

Route::get('/asistente', function () {
    return view('usuariomiig::asistente');
});

Route::get('/colegios-asignados/{id}', 'Digitalmiig\Usuariomiig\Controllers\RepresentantesController@colegios');

Route::get('proyeccionventas/{id}', function ($id) {
    $asignaturas = DB::table('datos')->where('colegio_id', '=', $id)->get();
    $categories = App\Grado::all();
    $grados = DB::table('grados')->get();
    $region = App\Colegio::find($id);
    $data = DB::table('campos')->where('colegio_id', $id)->whereIn('grado_id', [1, 2, 3])->exists();
    $visuales = App\Colegio::find($id);
    $titulo = DB::table('titulo')->get();
    $colegios = DB::table('colegios')->where('id','=',$id)->get();
    $editorial = DB::table('editoriales')->get();
    $areas = DB::table('colegios')->get();
    $date = DB::table('configuracion')->where('id', '=', 1)->get();
    $ano =  DB::table('configuracion')->where('id', '=', 1)->get();

    return view('usuariomiig::proyeccion-ventas')->with('grados', $grados)->with('data', $data)->with('editorial', $editorial)->with('editoriala', $editorial)->with('editorialb', $editorial)->with('editorialc', $editorial)->with('editoriald', $editorial)->with('editoriale', $editorial)->with('editorialf', $editorial)->with('region', $region)->with('categories', $categories)->with('colegios', $colegios)->with('visuales', $visuales)->with('titulo', $titulo)->with('titulof', $titulo)->with('areas', $areas)->with('asignaturas', $asignaturas)->with('date', $date)->with('ano', $ano);;
});

Route::post('/crearproventa', 'Digitalmiig\Colegiomiig\Controllers\ColegiosController@createproventaweb');


