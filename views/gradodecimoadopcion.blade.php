@extends ('adminsite.asistente')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent

 <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
 <link type="text/css" href="css/styles.css" rel="stylesheet">
 <script type="text/javascript" src="js/jquery.js"></script>


      <script type="text/javascript">
    $( function() {
    $("#category1a").change( function() {
        if ($(this).val() === "1") {
            $("#1a").prop("hidden", false);
        } else {
            $("#1a").prop("hidden", true);
        }
    });
    });
    </script>

        <script type="text/javascript">
    $( function() {
    $("#category1b").change( function() {
        if ($(this).val() === "1") {
            $("#1b").prop("hidden", false);
        } else {
            $("#1b").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1c").change( function() {
        if ($(this).val() === "1") {
            $("#1c").prop("hidden", false);
        } else {
            $("#1c").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1d").change( function() {
        if ($(this).val() === "1") {
            $("#1d").prop("hidden", false);
        } else {
            $("#1d").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1e").change( function() {
        if ($(this).val() === "1") {
            $("#1e").prop("hidden", false);
        } else {
            $("#1e").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1f").change( function() {
        if ($(this).val() === "1") {
            $("#1f").prop("hidden", false);
        } else {
            $("#1f").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1g").change( function() {
        if ($(this).val() === "1") {
            $("#1g").prop("hidden", false);
        } else {
            $("#1g").prop("hidden", true);
        }
    });
    });
    </script>

@stop
@section('contenido')
 

<div class="container">
	

 {{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'url' => array('/crearproventaadopcion/'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_matematicas" id="category1a" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1a" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_mat" id="category" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulo as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 1)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_espanol" id="category1b" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1b" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 2)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_ciencias" id="category1c" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1c" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 3)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_comprension" id="category1d" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1d" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 4)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_interes" id="category1e" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category1e" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 5)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_artistica" id="category1f" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category1f" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 6)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_ingles" id="category1g" required="required">
      <option value="" selected>Seleccione editorial</option>
      <option value="1">Libros y Libros</option>
      <option value="0">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1g" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 10)
        @if($titulo->asignatura == 7)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
</div>



    <input id="id_input" type="text" hidden>
    <input type="hidden" name="materia" value="1" />
    <input type="hidden" name="subcategory" value="10" />
    <input type="hidden" name="region" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio" value="{{$region->id}}" />
    <input type="hidden" name="representante" value="{{$region->representante_id}}" />
    <input type="hidden" name="metadopcion" value="1" />
    
    @foreach($date as $date)
    <input type="hidden" name="ano" value="{{$date->ano}}" />
    @endforeach


  <div class="modal-footer">
   {{Form::submit('Crear datos auditoría', array('class' => 'btn btn-primary')  )}}
  </div>
 {{ Form::close() }}

</div>





<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


@stop
