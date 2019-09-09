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
 

<div class="container-fluid">
  
                                 
@foreach($proventas as $proventas)
{{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'url' => array('/editar-proventa',$proventas->id))) }}

@if($proventas->pr_matematicas == 0)
 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  <h4><b>MT</b> - Matematicas </h4>
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
    '0' => 'No meta',
    '1' => 'Libros y Libros',
    ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
   </div>
   
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element" hidden>
    <select class="form-control input-sm" name="pr_titulo_mat" id="category">
     <option value="0" selected>Seleccione título</option>
      @foreach($titulo as $titulos)
      @if($titulos->grado == 2)
      @if($titulos->asignatura == 1)
      <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
      @endif
      @endif
      @endforeach
    </select>
   </div>
   
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <input type="text" name="pr_poblacion_mat" id="id_inputmat" class="form-control" placeholder="Población"  disabled>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <input id="id_inputmat1" name="pr_vender_mat" class="form-control" placeholder="Libros a vender" type="text" disabled>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <select class="form-control" name="pr_metas_mat" id="id_inputmat3" disabled>
     <option value="" disabled selected>Seleccione meta</option>
      <option value="1">Crecimiento</option>
       <option value="2">Sostenimiento</option>
    </select>
   </div>

 </div>
 
 @else
 
 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
  <h4><b>MT</b> - Matematicas </h4>
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
    '0' => 'No meta',
    '1' => 'Libros y Libros',
    ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
   </div>
      
   @if($proventas->pr_matematicas == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element">
     <select class="form-control input-sm" name="pr_titulo_mat" id="category1a">
      @foreach($titulowebf as $tituloweb)
       @if($tituloweb->id == $proventas->pr_titulo_mat)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
       @endif
      @endforeach

      @foreach($titulo as $titulos)
       @if($titulos->grado == 2)
        @if($titulos->asignatura == 1)
        @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulos->portafolio)
          <option value="{{$titulos->id}}">{{$titulos->nombre}}f</option>
         @else
         @endif
         @endforeach
        @endif
       @endif
      @endforeach
     </select>
    </div>
    
    @else
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_mat" id="category1a">
      <option value="{{$proventas->pr_titulo_mat}}" selected>{{$proventas->pr_titulo_mat}}</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
         @if($titulos->asignatura == 1)
          <option value="{{$titulos->id}}">{{$titulos->nombre}}a</option>
         @endif
        @endif
       @endforeach
      </select>
     </div>
             
     @endif

    @if($proventas->pr_matematicas == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_mat" id="id_inputmat" class="form-control" value="{{$proventas->pr_poblacion_mat}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat1" name="pr_vender_mat" class="form-control" value="{{$proventas->pr_vender_mat}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" value="{{$proventas->pr_muestra_mat}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_mat', [$proventas->pr_metas_mat => $proventas->pr_metas_mat,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputmat3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_mat" id="id_inputmat" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat1" name="pr_vender_mat" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_mat" id="id_inputmat3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif
            </div>


@endif

@if($proventas->pr_espanol == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_esp" id="category1b">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 2)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_esp" id="id_inputesp" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_esp" id="id_inputesp3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
</div>
@else

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>ES</b> - Español</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
              </div>
      
              @if($proventas->pr_espanol == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element">
                <select class="form-control input-sm" name="pr_titulo_esp" id="category1b">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_esp)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach
       
                 @foreach($titulo as $titulos)
                  @if($titulos->grado == 2)
                   @if($titulos->asignatura == 2)
                    @foreach($colegios as $colegiosa)
                    @if($colegiosa->adopcion == $titulos->portafolio)
                    <option value="{{$titulos->id}}">{{$titulos->nombre}} </option>
                    @else
                    @endif
                    @endforeach
                   @endif
                  @endif
                 @endforeach
                </select>
               </div>
    
              @else
    
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_esp" id="category1b">
                 <option value="" disabled>Seleccione Titulo</option>
                  @foreach($titulo as $titulos)
                   @if($titulos->grado == 2)
                    @if($titulos->asignatura == 2)
                     <option value="{{$titulos->id}}">{{$titulos->nombre}} b</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
              @endif

               @if($proventas->pr_espanol == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_esp" id="id_inputesp" class="form-control" value="{{$proventas->pr_poblacion_esp}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" value="{{$proventas->pr_vender_esp}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" value="{{$proventas->pr_muestra_esp}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_esp', [$proventas->pr_metas_esp => $proventas->pr_metas_esp,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputesp3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_esp" id="id_inputesp" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_esp" id="id_inputesp3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

            </div>

@endif







@if($proventas->pr_ciencias == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
              '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_cie" id="category1c">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 3)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_cie" id="id_inputcie" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_cie" id="id_inputcie3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
</div>

@else
 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>CS</b> - Ciencias</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
              </div>
      
              @if($proventas->pr_ciencias == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element">
                <select class="form-control input-sm" name="pr_titulo_cie" id="category1c">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_cie)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach

                 @foreach($titulo as $titulos)
                  @if($titulos->grado == 2)
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
        
              @else

               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_cie" id="category1c">
                 <option  selected>Seleccione titulo</option>
                  @foreach($titulo as $titulos)
                   @if($titulos->grado == 2)
                    @if($titulos->asignatura == 3)
                     <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
    
              @endif

               @if($proventas->pr_ciencias == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_cie" id="id_inputcie" class="form-control" value="{{$proventas->pr_poblacion_cie}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" value="{{$proventas->pr_vender_cie}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" value="{{$proventas->pr_muestra_cie}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_cie', [$proventas->pr_metas_cie => $proventas->pr_metas_cie,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputcie3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_cie" id="id_inputcie" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_cie" id="id_inputcie3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

            </div>

@endif




@if($proventas->pr_comprension == 0)

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_com" id="category1d">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 4)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_com" id="id_inputcom" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <select class="form-control" name="pr_metas_com" id="id_inputcom3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
</div>

@else
   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>CL</b> - Comprensión Lectora</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
               ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
              </div>
      
              @if($proventas->pr_comprension == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element">
                <select class="form-control input-sm" name="pr_titulo_com" id="category1d">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_com)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach
       
                 @foreach($titulo as $titulos)
                  @if($titulos->grado == 2)
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
    
              @else
    
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_com" id="category1d">
                 <option  selected>Seleccione titulo</option>
                  @foreach($titulo as $titulos)
                   @if($titulos->grado == 2)
                    @if($titulos->asignatura == 4)
                     <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
    
              @endif

              @if($proventas->pr_comprension == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_com" id="id_inputcom" class="form-control" value="{{$proventas->pr_poblacion_com}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" value="{{$proventas->pr_vender_com}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" value="{{$proventas->pr_muestra_com}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_com', [$proventas->pr_metas_com => $proventas->pr_metas_com,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputcom3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_com" id="id_inputcom" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_com" id="id_inputcom3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

            </div>
@endif



@if($proventas->pr_interes == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
               '0' => 'No meta',
               '1' => 'Libros y Libros',
                ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category1e">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 5)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_int" id="id_inputint" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_int" id="id_inputint3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
</div>
@else
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
       '0' => 'No meta',
               '1' => 'Libros y Libros',
       ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
      </div>
      
     @if($proventas->pr_interes == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element">
     <select class="form-control input-sm" name="pr_titulo_int" id="category">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_int)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
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
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category">
      <option  selected>Seleccione titulo</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 5)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @endif

     @if($proventas->pr_interes == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_int" id="id_inputint" class="form-control" value="{{$proventas->pr_poblacion_int}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" value="{{$proventas->pr_vender_int}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" value="{{$proventas->pr_muestra_int}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_int', [$proventas->pr_metas_int => $proventas->pr_metas_int,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputint3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_int" id="id_inputint" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_int" id="id_inputint3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

</div>

@endif


@if($proventas->pr_artistica == 0)

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>
    
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '0' => 'No meta',
               '1' => 'Libros y Libros',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category1f">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 6)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_art" id="id_inputart" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_art" id="id_inputart3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>

</div>
@else

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ATR</b> - Artistica</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '0' => 'No meta',
               '1' => 'Libros y Libros',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
     @if($proventas->pr_artistica == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element">
     <select class="form-control input-sm" name="pr_titulo_art" id="category">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_art)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
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
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category">
      <option  selected>Seleccione titulo</option>
       @foreach($titulo as $titulos)
        @if($titulos->grado == 2)
        @if($titulos->asignatura == 6)
         <option value="{{$titulos->id}}">{{$titulos->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @endif

@if($proventas->pr_artistica == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_art" id="id_inputart" class="form-control" value="{{$proventas->pr_poblacion_art}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" value="{{$proventas->pr_vender_art}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" value="{{$proventas->pr_muestra_art}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_art', [$proventas->pr_metas_art => $proventas->pr_metas_art,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputart3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_art" id="id_inputart" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_art" id="id_inputart3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

</div>
@endif

@if($proventas->pr_ingles == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>
    
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '0' => 'No meta',
               '1' => 'Libros y Libros',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>
      

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category1g">
      <option value="0" selected>Seleccione título</option>
       @foreach($titulo as $titulo)
        @if($titulo->grado == 2)
        @if($titulo->asignatura == 7)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_ing" id="id_inputing" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing1" name="pr_vender_ing" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing2" name="pr_muestra_ing" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_ing" id="id_inputing3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
</div>
@else
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '0' => 'No meta',
       '1' => 'Libros y Libros',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>
      
     @if($proventas->pr_ingles == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element">
     <select class="form-control input-sm" name="pr_titulo_ing" id="category">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_ing)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulo as $titulo)
        @if($titulo->grado == 2)
        @if($titulo->asignatura == 7)
         @foreach($colegios as $colegiosa)
         @if($colegiosa->adopcion == $titulo->portafolio)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
         @else
         @endif
         @endforeach
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category">
      <option  selected>Seleccione titulo</option>
       @foreach($titulo as $titulo)
        @if($titulo->grado == 2)
        @if($titulo->asignatura == 7)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @endif

    @if($proventas->pr_ingles == 1) 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_ing" id="id_inputing" class="form-control" value="{{$proventas->pr_poblacion_ing}}" placeholder="Población">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing1" name="pr_vender_ing" class="form-control" value="{{$proventas->pr_vender_ing}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing2" name="pr_muestra_ing" class="form-control" value="{{$proventas->pr_muestra_ing}}" placeholder="Muestras solicitadas" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         {{ Form::select('pr_metas_ing', [$proventas->pr_metas_ing => $proventas->pr_metas_ing,
         '1' => 'Crecimiento',
         '2' => 'Sostenimiento'], null, array('class' => 'form-control', 'id' => 'id_inputing3')) }}
        </div>
 
       @else

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input type="text" name="pr_poblacion_ing" id="id_inputing" class="form-control" placeholder="Población"  disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing1" name="pr_vender_ing" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing2" name="pr_muestra_ing" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <select class="form-control" name="pr_metas_ing" id="id_inputing3" disabled>
          <option value="" disabled selected>Seleccione meta</option>
          <option value="1">Crecimiento</option>
          <option value="2">Sostenimiento</option>
         </select>
        </div>
      
       @endif

</div>
@endif


    <input id="id_input" type="text" hidden>
    <input type="hidden" name="materia" value="1" />
    <input type="hidden" name="subcategory" value="{{$proventas->grado_id}}" />
    <input type="hidden" name="region" value="{{$proventas->region_id}}" />
    <input type="hidden" name="colegio" value="{{$proventas->colegio_id}}" />
    <input type="hidden" name="representante" value="{{$proventas->representante_id}}" />
    
 
    <input type="hidden" name="ano" value="{{$proventas->ano}}" />
 


  <div class="modal-footer">
   @if(Auth::user()->rol_id == 5)
   {{Form::submit('Guardar metas', array('class' => 'btn btn-primary')  )}}
   @else
   @endif
  </div>

 {{ Form::close() }}
  @endforeach
</div>



<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

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
