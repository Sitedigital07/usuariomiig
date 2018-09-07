@extends ('adminsite.auditor')
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
            $("#1ab").prop("hidden", true);
            $("#1aa").prop("hidden", true);
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
 @foreach($date as $date)
@endforeach
<div class="container">
  
                                 
@foreach($proventas as $proventas)


{{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'url' => array('/editar-proventaadopcionaud',$proventas->id))) }}



@if($proventas->pr_matematicas == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1aa" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_mat" id="category1a">
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_mat)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulo as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 1)
             <option value="{{$titulo->id}}">{{$titulo->nombre}}a</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ab" class="element" hidden>
       <select class="form-control input-sm" name="edt_mat" id="category1a" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorial as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_matematicas == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
      </div>
      
      @if($proventas->pr_matematicas == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1aa" class="element" >
        <select class="form-control input-sm" name="pr_titulo_mat" id="category1a" >
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_mat)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulo as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 1)
            <option value="{{$titulo->id}}">{{$titulo->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ab" class="element" hidden>
        <select class="form-control input-sm" name="edt_mat" id="category1a" >
         @foreach($editorial as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
          @endforeach 
        </select>
       </div>
    
        @else
       @endif
  </div>
 @elseif($proventas->pr_matematicas == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
      </div>
      
      @if($proventas->pr_matematicas == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1aa" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_mat" id="category1a" >
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_mat)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulo as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 1)
            <option value="{{$titulo->id}}">{{$titulo->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ab" class="element">
        <select class="form-control input-sm" name="edt_mat" id="category1a" >
         
         @foreach($editorial as $editoriala)
          @if($editoriala->id == $proventas->edt_mat)
           <option value="{{$editoriala->id}}">{{$editoriala->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorial as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif






@if($proventas->pr_espanol == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ba" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_esp)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulof as $titulob)
          @if($titulob->grado == 6)
           @if($titulob->asignatura == 2)
             <option value="{{$titulob->id}}">{{$titulob->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1bb" class="element" hidden>
       <select class="form-control input-sm" name="edt_esp" id="category1b" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_espanol == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
      </div>
      
      @if($proventas->pr_espanol == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ba" class="element" >
        <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" >
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_esp)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulowebf as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 2)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1bb" class="element" hidden>
        <select class="form-control input-sm" name="edt_esp" id="category1b" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_espanol == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
      </div>
      
      @if($proventas->pr_espanol == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ba" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" >
         @foreach($titulowebf as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_esp)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulof as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 2)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1bb" class="element">
        <select class="form-control input-sm" name="edt_esp" id="category1b" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_esp)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif






@if($proventas->pr_ciencias == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ca" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_cie)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 3)
             <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1cb" class="element" hidden>
       <select class="form-control input-sm" name="edt_cie" id="category1c" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_ciencias == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
      </div>
      
      @if($proventas->pr_ciencias == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ca" class="element" >
        <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_cie)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 3)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1cb" class="element" hidden>
        <select class="form-control input-sm" name="edt_cie" id="category1c" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_ciencias == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
      </div>
      
      @if($proventas->pr_ciencias == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ca" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_cie)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 3)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1cb" class="element">
        <select class="form-control input-sm" name="edt_cie" id="category1c" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_cie)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif






@if($proventas->pr_comprension == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Compresión Lectora </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1da" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_com" id="category1d" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_com)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 4)
             <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1db" class="element" hidden>
       <select class="form-control input-sm" name="edt_com" id="category1d" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_comprension == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
      </div>
      
      @if($proventas->pr_comprension == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1da" class="element" >
        <select class="form-control input-sm" name="pr_titulo_com" id="category1d" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_com)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 4)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1db" class="element" hidden>
        <select class="form-control input-sm" name="edt_com" id="category1d" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_comprension == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
      </div>
      
      @if($proventas->pr_comprension == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1da" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_com" id="category1d" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_com)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 4)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1db" class="element">
        <select class="form-control input-sm" name="edt_com" id="category1d" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_com)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif





@if($proventas->pr_interes == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Intéres General </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ea" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_int" id="category1e" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_int)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulo)
          @if($titulo->grado == 6)
           @if($titulo->asignatura == 5)
             <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1eb" class="element" hidden>
       <select class="form-control input-sm" name="edt_int" id="category1e" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_interes == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Intéres General </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
      </div>
      
      @if($proventas->pr_interes == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ea" class="element" >
        <select class="form-control input-sm" name="pr_titulo_int" id="category1e" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_int)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 5)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1eb" class="element" hidden>
        <select class="form-control input-sm" name="edt_int" id="category1e" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_interes == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Intéres General </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
      </div>
      
      @if($proventas->pr_interes == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ea" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_int" id="category1e" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_int)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 5)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1eb" class="element">
        <select class="form-control input-sm" name="edt_int" id="category1e" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_int)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif




@if($proventas->pr_artistica == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fa" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_art" id="category1f" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_art)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $tituloa)
          @if($tituloa->grado == 6)
           @if($tituloa->asignatura == 6)
             <option value="{{$tituloa->id}}">{{$tituloa->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fb" class="element" hidden>
       <select class="form-control input-sm" name="edt_art" id="category1f" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_artistica == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Intéres General </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
      @if($proventas->pr_artistica == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fa" class="element" >
        <select class="form-control input-sm" name="pr_titulo_art" id="category1f" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_art)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 6)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fb" class="element" hidden>
        <select class="form-control input-sm" name="edt_art" id="category1f" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_artistica == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
      @if($proventas->pr_artistica == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fa" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_art" id="category1f" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_art)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 6)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1fb" class="element">
        <select class="form-control input-sm" name="edt_art" id="category1f" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_art)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif





@if($proventas->pr_ingles == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ga" class="element" hidden>
       <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" >
        <option value="" selected disabled>Seleccione Titulo</option>
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_ing)
           <option value="{{$tituloweb->id}}">{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $tituloa)
          @if($tituloa->grado == 6)
           @if($tituloa->asignatura == 7)
             <option value="{{$tituloa->id}}">{{$tituloa->nombre}}</option>
           @endif
          @endif
         @endforeach
       </select>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1gb" class="element" hidden>
       <select class="form-control input-sm" name="edt_ing" id="category1g" >
              <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
       </select>
      </div>
  </div>

@elseif($proventas->pr_ingles == 1)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>
      
      @if($proventas->pr_ingles == 1)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ga" class="element" >
        <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_ing)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulowebf)
          @if($titulowebf->grado == 6)
           @if($titulowebf->asignatura == 7)
            <option value="{{$titulowebf->id}}">{{$titulowebf->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1gb" class="element" hidden>
        <select class="form-control input-sm" name="edt_ing" id="category1g" >
        <option value="" disabled selected>Seleccione editorial</option>  
              @foreach($editorialwebf as $editorial)
              <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
              @endforeach
        </select>
       </div>
    
        @else
       @endif
</div>
 @elseif($proventas->pr_ingles == 2)
  
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       '2' => 'Otra',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>
      
      @if($proventas->pr_ingles == 2)                               
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1ga" class="element" hidden>
        <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" >
         @foreach($titulom as $tituloweb)
          @if($tituloweb->id == $proventas->pr_titulo_ing)
           <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}a</option>
          @endif
         @endforeach

         @foreach($titulom as $titulof)
          @if($titulof->grado == 6)
           @if($titulof->asignatura == 7)
            <option value="{{$titulof->id}}">{{$titulof->nombre}}a</option>
           @endif
          @endif
         @endforeach
        </select>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="1gb" class="element">
        <select class="form-control input-sm" name="edt_ing" id="category1g" >
         
         @foreach($editorialf as $editorial)
          @if($editorial->id == $proventas->edt_ing)
           <option value="{{$editorial->id}}">{{$editorial->editorial}}</option> 
          @endif 
         @endforeach
         @foreach($editorialwebf as $editorial)
          <option value="{{$editorial->id}}">{{$editorial->editorial}}</option>  
         @endforeach

        </select>
       </div>
    
        @else
       @endif

      </div>
@endif



<input type="hidden" name="colegio" value="{{$proventas->colegio_id}}" />
<input type="hidden" name="grado" value="{{$proventas->grado_id}}" />
<input type="hidden" name="region" value="{{$proventas->region_id}}" />
<input type="hidden" name="representante" value="{{$proventas->representante_id}}" />




   @foreach($datef as $date)
   @if($date->ano == $proventas->ano)
    <input type="hidden" name="ano" value="{{$proventas->ano}}" />
    @else
    <input type="hidden" name="ano" value="{{$date->ano}}" />
    @endif
  @endforeach


  <div class="modal-footer">
   {{Form::submit('Crear datos auditoría', array('class' => 'btn btn-primary')  )}}
  </div>

 {{ Form::close() }}
  @endforeach
</div>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


@stop
