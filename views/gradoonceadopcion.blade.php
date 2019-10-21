@extends ('adminsite.representante')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent

 <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
 <link type="text/css" href="css/styles.css" rel="stylesheet">
 <script type="text/javascript" src="js/jquery.js"></script>

 <style type="text/css">
  select:required:invalid {
  color: gray;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: black;
}
</style>

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
 

<div class="container-fluid">
  

  @foreach($colegios as $tituloema)
@if($tituloema->representante_id ==  Auth::user()->id)


 {{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'onsubmit' => 'return checkSubmit()', 'url' => array('/crearproventaadopcion/'))) }}

 @else
 {{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'onsubmit' => 'return checkSubmit()', 'url' => array('/crearproventaadopcionfail/'))) }}
 @endif
 @endforeach
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matemáticas </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_matematicas" id="category1a" required="required">
      <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_mat" id="category" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 1)
         @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>

 

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
      <input id="id_inputmat1" name="pr_vender_mat" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>

   
</div>


  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_espanol" id="category1b" required="required">
      <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 2)
         @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputesp1" name="pr_vender_esp" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>


</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_ciencias" id="category1c" required="required">
      <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 3)
         @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputcie1" name="pr_vender_cie" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>

</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_comprension" id="category1d" required="required">
     <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 4)
         @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>

  

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputcom1" name="pr_vender_com" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputcom2" name="pr_muestra_com" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>

    
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interés General </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_interes" id="category1e" required="required">
      <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category1e" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 5)
        @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputint1" name="pr_vender_int" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputint2" name="pr_muestra_int" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>

 
</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artística </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_artistica" id="category1f" required="required">
     <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category1f" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 6)
        @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputart1" name="pr_vender_art" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputart2" name="pr_muestra_art" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>


</div>

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Inglés </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
     <select class="form-control input-sm" name="pr_ingles" id="category1g" required="required">
      <option value="0" selected>No adopción</option>
      <option value="1">Libros y Libros</option>
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" required="required">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 11)
        @if($titulos->asignatura == 7)
        @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
         @else
         @endif
        @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
      <input id="id_inputing1" name="pr_vender_ing" class="form-control" placeholder="Libros a vender" type="text" disabled>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" class="element">
     <input id="id_inputing2" name="pr_muestra_ing" class="form-control" placeholder="Muestras entregadas" type="text" disabled>
    </div>


</div>



    <input id="id_input" type="text" hidden>
    <input type="hidden" name="materia" value="1" />
    <input type="hidden" name="subcategory" value="11" />
    <input type="hidden" name="region" value="{{$region->region_id}}" />
    <input type="hidden" name="colegio" value="{{$region->id}}" />
    <input type="hidden" name="representante" value="{{$region->representante_id}}" />
    <input type="hidden" name="metadopcion" value="0" />
    
    @foreach($date as $date)
    <input type="hidden" name="ano" value="{{$date->ano}}" />
    @endforeach



  <div class="modal-footer">
       @if(Auth::user()->rol_id == 5)
      @if (DB::table('cierre')->where('colegio_id', '=', $region->id)->where('ano', '=', $date->ano)->where('cierre','=',1)->exists())
   {{Form::submit('Guardar adopción', array('class' => 'btn btn-primary','id' => 'btsubmit')  )}}
   @else
   @endif
   @else
   @endif
  </div>
 {{ Form::close() }}

</div>





<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
function checkSubmit() {
    document.getElementById("btsubmit").value = "Enviando...";
    document.getElementById("btsubmit").disabled = true;
    return true;
}
  </script>

<script type="text/javascript">
  
$( function() {
    $("#category1a").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputmat").prop("disabled", true);
        } else {
            $("#id_inputmat").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1a").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputmat1").prop("disabled", true);
        } else {
            $("#id_inputmat1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1a").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputmat2").prop("disabled", true);
        } else {
            $("#id_inputmat2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1a").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputemat3").prop("disabled", true);
        } else {
            $("#id_inputmat3").prop("disabled", false);
        }
    });
});
</script>



    <script type="text/javascript">
  
$( function() {
    $("#category1b").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputesp").prop("disabled", true);
        } else {
            $("#id_inputesp").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1b").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputesp1").prop("disabled", true);
        } else {
            $("#id_inputesp1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1b").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputesp2").prop("disabled", true);
        } else {
            $("#id_inputesp2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1b").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputesp3").prop("disabled", true);
        } else {
            $("#id_inputesp3").prop("disabled", false);
        }
    });
});
</script>

 <script type="text/javascript">
  
$( function() {
    $("#category1c").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcie").prop("disabled", true);
        } else {
            $("#id_inputcie").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1c").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcie1").prop("disabled", true);
        } else {
            $("#id_inputcie1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1c").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcie2").prop("disabled", true);
        } else {
            $("#id_inputcie2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1c").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcie3").prop("disabled", true);
        } else {
            $("#id_inputcie3").prop("disabled", false);
        }
    });
});
</script>

<script type="text/javascript">
  
$( function() {
    $("#category1d").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcom").prop("disabled", true);
        } else {
            $("#id_inputcom").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1d").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcom1").prop("disabled", true);
        } else {
            $("#id_inputcom1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1d").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcom2").prop("disabled", true);
        } else {
            $("#id_inputcom2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1d").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputcom3").prop("disabled", true);
        } else {
            $("#id_inputcom3").prop("disabled", false);
        }
    });
});
</script>


<script type="text/javascript">
  
$( function() {
    $("#category1e").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputint").prop("disabled", true);
        } else {
            $("#id_inputint").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1e").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputint1").prop("disabled", true);
        } else {
            $("#id_inputint1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1e").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputint2").prop("disabled", true);
        } else {
            $("#id_inputint2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1e").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputint3").prop("disabled", true);
        } else {
            $("#id_inputint3").prop("disabled", false);
        }
    });
});
</script>

<script type="text/javascript">
  
$( function() {
    $("#category1f").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputart").prop("disabled", true);
        } else {
            $("#id_inputart").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1f").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputart1").prop("disabled", true);
        } else {
            $("#id_inputart1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1f").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputart2").prop("disabled", true);
        } else {
            $("#id_inputart2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1f").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputart3").prop("disabled", true);
        } else {
            $("#id_inputart3").prop("disabled", false);
        }
    });
});
</script>

<script type="text/javascript">
  
$( function() {
    $("#category1g").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputing").prop("disabled", true);
        } else {
            $("#id_inputing").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1g").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputing1").prop("disabled", true);
        } else {
            $("#id_inputing1").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1g").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputing2").prop("disabled", true);
        } else {
            $("#id_inputing2").prop("disabled", false);
        }
    });
});
</script>

    <script type="text/javascript">
  
$( function() {
    $("#category1g").change( function() {
        if ($(this).val() === "0") {
            $("#id_inputing3").prop("disabled", true);
        } else {
            $("#id_inputing3").prop("disabled", false);
        }
    });
});
</script>

@stop
