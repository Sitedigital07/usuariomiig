@extends ('adminsite.auditor')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent
@stop

@section('contenido')




<div class="container">

<div class="container">

  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Productos registrados con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

</div>


<link type="text/css" href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>






<script type="text/javascript">
function mostrar(id) {
  if (id == "primero") {
    $("#primero").show();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }
  
  if (id == "segundo") {
    $("#primero").hide();
    $("#segundo").show();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }
  
  if (id == "tercero") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").show();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }
  
   if (id == "cuarto") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").show();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "quinto") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").show();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "sexto") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").show();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "septimo") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").show();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "octavo") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").show();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "noveno") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").show();
    $("#decimo").hide();
    $("#once").hide();
  }

    if (id == "decimo") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").show();
    $("#once").hide();
  }

  if (id == "once") {
    $("#primero").hide();
    $("#segundo").hide();
    $("#tercero").hide();
    $("#cuarto").hide();
    $("#quinto").hide();
    $("#sexto").hide();
    $("#septimo").hide();
    $("#octavo").hide();
    $("#noveno").hide();
    $("#decimo").hide();
    $("#once").show();
  }

}
</script>
</head>

<body>
<div class="card">
<h1 style="font-size: 22px"><strong>Proyección Ventas</strong> <span style="font-weight: 100"> 
  @foreach($colegios as $colegios)
{{$colegios->nombres}}
@endforeach</span> </h1>

<hr>
@foreach($ano as $ano)

@endforeach

<form action="index.php" method="post">
  Seleccione Grado 
    <select id="status" class="form-control form-control-lg" name="status" onChange="mostrar(this.value);">
       <option value="" selected>Seleccione grado</option>

       @if (DB::table('proventas')->where('grado_id', '=', 1)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="primero" disabled>Primero</option>
       @else
       <option value="primero">Primero</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 2)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
        <option value="segundo" disabled>Segundo</option>
       @else
       <option value="segundo">Segundo</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 3)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="tercero" disabled>Tercero</option>
       @else
       <option value="tercero">Tercero</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 4)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="cuarto" disabled>Cuarto</option>
       @else
       <option value="cuarto">Cuarto</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 5)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="quinto" disabled>Quinto</option>
       @else
       <option value="quinto">Quinto</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 6)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="sexto" disabled>Sexto</option>
       @else
       <option value="sexto">Sexto</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 7)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="septimo" disabled>Séptimo</option>
       @else
       <option value="septimo">Séptimo</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 8)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="octavo" disabled>Octavo</option>
       @else
       <option value="octavo">Octavo</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 9)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="noveno" disabled>Noveno</option>
       @else
       <option value="noveno">Noveno</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 10)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="decimo" disabled>Décimo</option>
       @else
       <option value="decimo">Décimo</option>
       @endif

       @if (DB::table('proventas')->where('grado_id', '=', 11)->where('ano', '=', $ano->ano)->where('colegio_id', '=', Request::segment(2))->exists()) 
       <option value="once" disabled>Once</option>
       @else
       <option value="once">Once</option>
       @endif

     
     </select>
</form>

<div id="primero" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulo as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="1" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   @foreach($date as $date)
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
   @endforeach
  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>


    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />
   
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>



   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="1" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  
  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="1" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="1" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
  
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="1" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="1" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="1g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="1" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
 
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="segundo" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="2" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="2" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="2" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

  

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="2" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

 
  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="2" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="2" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="2g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 2)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="2" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>

<div id="tercero" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="3" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="3" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="3" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="3" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
    
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  
  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="3" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
  
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  
  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="3" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="3g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 3)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="3" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>

<div id="cuarto" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="4" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="4" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="4" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="4" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="4" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
   
      </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="4" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="4g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 4)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="4" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
   
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="quinto" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="5" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="5" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="5" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="5" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="5" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="5" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="5g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 5)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="5" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
   </div>
{{ Form::close() }}
</div>

<div id="sexto" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="6" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="6" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  
  
  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="6" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   
 
  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="6" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="6" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
  
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div> 
   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="6" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="6g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 6)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="6" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="septimo" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="7" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div> 

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="7" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  
 
  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7c" class="element" >
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="7" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="7" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="7" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="7" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

<input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="7g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 7)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="7" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="octavo" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="8" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  
 
  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="8" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="8" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="8" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="8" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="8" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="8g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 8)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="8" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
   
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="noveno" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="9" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="9" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
  
  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="9" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="9" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />
    
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="9" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

 
  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="9" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="9g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 9)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="9" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
   
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>

<div id="decimo" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  
  
  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

  <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="10" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="10" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="10" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>


    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="10" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />
    
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="10" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
    <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="10" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="10g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 10)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="10" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


<div id="once" class="element" style="display: none;">
  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearproventa'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>MT</b> - Matematicas</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11a" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 1)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="1" />
   <input type="hidden" name="subcategory[]" value="11" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  

  <h4><b>ES</b> - Español</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11b" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 2)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="2" />
   <input type="hidden" name="subcategory[]" value="11" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
   <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  <h4><b>CS</b> - Sociales</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11c" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 3)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
   <input type="hidden" name="materia[]" value="3" />
   <input type="hidden" name="subcategory[]" value="11" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
      <input type="hidden" name="ano[]" value="{{$date->ano}}" />
   
  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   

  <h4><b>CL</b> - Comprensión Lectora</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11d" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 4)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

    <input type="hidden" name="materia[]" value="4" />
    <input type="hidden" name="subcategory[]" value="11" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
       <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">

  
  <h4><b>IG</b> - Interes General</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

    <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11e" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 5)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>
    
    <input type="hidden" name="materia[]" value="5" />
    <input type="hidden" name="subcategory[]" value="11" />
    <input type="hidden" name="region[]" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio[]" value="{{$region->id}}" />
    <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
       <input type="hidden" name="ano[]" value="{{$date->ano}}" />

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ART</b> - Artistica</h4>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
    </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11f" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 6)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="6" />
   <input type="hidden" name="subcategory[]" value="11" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
      <input type="hidden" name="ano[]" value="{{$date->ano}}" />

 </div>


 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">


  <h4><b>ING</b> - Ingles</h4>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="number" class="form-control input-sm" value="0" name="cantidad[]" value="" />
   </div>

   <input type="hidden" class="form-control input-sm" value="1" name="edt[]" />

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" id="11g" class="element">
    <select class="form-control input-sm" name="titulo[]" id="category">
     <option value="0" selected>Seleccione Título</option>
      @foreach($titulof as $titulo)
      @if($titulo->grado == 11)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
       @endif
       @endif
      @endforeach
    </select>
   </div>

   <input type="hidden" name="materia[]" value="7" />
   <input type="hidden" name="subcategory[]" value="11" />
   <input type="hidden" name="region[]" value="{{$region->region_id}}" />
   <input type="hidden" name="colegio[]" value="{{$region->id}}" />
   <input type="hidden" name="representante[]" value="{{$region->representante_id}}" />
  <input type="hidden" name="ano[]" value="{{$date->ano}}" />
 
 </div>

   <input type="hidden" name="colegiored" value="{{$region->id}}" />
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     


   <div class="modal-footer">
    
    {{Form::submit('Crear', array('class' => 'btn btn-primary btn-md')  )}}
   </div>
{{ Form::close() }}
</div>


</div>

</body>
</html>
</div>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
@stop
