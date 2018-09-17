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
            $("#1aa").prop("hidden", false);
            $("#1ab").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1ab").prop("hidden", false);
            $("#1aa").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1aa").prop("hidden", true);
            $("#1ab").prop("hidden", true);
        }
    });
    });
    </script>



        <script type="text/javascript">
    $( function() {
    $("#category1b").change( function() {
           if ($(this).val() === "1") {
            $("#1ba").prop("hidden", false);
            $("#1bb").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1bb").prop("hidden", false);
            $("#1ba").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1bb").prop("hidden", true);
            $("#1ba").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1c").change( function() {
           if ($(this).val() === "1") {
            $("#1ca").prop("hidden", false);
            $("#1cb").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1cb").prop("hidden", false);
            $("#1ca").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1cb").prop("hidden", true);
            $("#1ca").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1d").change( function() {
           if ($(this).val() === "1") {
            $("#1da").prop("hidden", false);
            $("#1db").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1db").prop("hidden", false);
            $("#1da").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1db").prop("hidden", true);
            $("#1da").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1e").change( function() {
            if ($(this).val() === "1") {
            $("#1ea").prop("hidden", false);
            $("#1eb").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1eb").prop("hidden", false);
            $("#1ea").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1eb").prop("hidden", true);
            $("#1ea").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1f").change( function() {
            if ($(this).val() === "1") {
            $("#1fa").prop("hidden", false);
            $("#1fb").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1fb").prop("hidden", false);
            $("#1fa").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1fb").prop("hidden", true);
            $("#1fa").prop("hidden", true);
        }
    });
    });
    </script>
         <script type="text/javascript">
    $( function() {
    $("#category1g").change( function() {
            if ($(this).val() === "1") {
            $("#1ga").prop("hidden", false);
            $("#1gb").prop("hidden", true);
        } if ($(this).val() === "2") {
            $("#1gb").prop("hidden", false);
            $("#1ga").prop("hidden", true);
        } if ($(this).val() === "0") {
            $("#1gb").prop("hidden", true);
            $("#1ga").prop("hidden", true);
        }
    });
    });
    </script>

@stop
@section('contenido')
 

<div class="container">
  

 {{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'url' => array('/crearproventaadopcionaud/'))) }}

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_matematicas" id="category1a" required="required">
      <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1aa" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_mat" id="category1a" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulo as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 1)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ab" class="element" hidden>
     <select class="form-control input-sm" name="edt_mat" id="category1a" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorial as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>


    





  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_espanol" id="category1b" required="required">
      <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ba" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 2)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1bb" class="element" hidden>
     <select class="form-control input-sm" name="edt_esp" id="category1b" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editoriala as $editoriala)
         <option value="{{$editoriala->id}}">{{$editoriala->editorial}}</option>
       @endforeach
     </select>
    </div>

</div>









  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_ciencias" id="category1c" required="required">
        <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ca" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 3)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1cb" class="element" hidden>
     <select class="form-control input-sm" name="edt_cie" id="category1c" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorialb as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>











  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_comprension" id="category1d" required="required">
       <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1da" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 4)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1db" class="element" hidden>
     <select class="form-control input-sm" name="edt_com" id="category1d" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorialb as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>







  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_interes" id="category1e" required="required">
        <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ea" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category1e" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 5)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1eb" class="element" hidden>
     <select class="form-control input-sm" name="edt_int" id="category1e" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorialb as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>







  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_artistica" id="category1f" required="required">
         <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fa" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category1f" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 6)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fb" class="element" hidden>
     <select class="form-control input-sm" name="edt_art" id="category1f" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorialb as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>






  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <select class="form-control input-sm" name="pr_ingles" id="category1g" required="required">
         <option value="0">No meta</option>
      <option value="1">Libros y Libros</option>
      <option value="2">Otra</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ga" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" required="required">
      <option value="0" selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 7)
        @if($titulo->asignatura == 7)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1gb" class="element" hidden>
     <select class="form-control input-sm" name="edt_ing" id="category1g" required="required">
      <option value="0" selected>Seleccione editorial</option>
        @foreach($editorialb as $editorial)
         <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>
       @endforeach
     </select>
    </div>
</div>



    <input id="id_input" type="text" hidden>
    <input type="hidden" name="materia" value="1" />
    <input type="hidden" name="subcategory" value="7" />
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
