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
 @foreach($date as $date)
@endforeach
<div class="container-fluid">
  
                                 
@foreach($proventas as $proventas)


{{ Form::open(array('method' => 'POST', 'id' => 'defaultForm', 'url' => array('/editar-proventaadopcionasi',$proventas->id))) }}



@if($proventas->pr_matematicas == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>MT</b> - Matematicas </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_mat" id="category" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulo as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 1)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>




        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat1" name="pr_vender_mat" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

 

</div>
@else
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>MT</b> - Matematicas</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_matematicas', [$proventas->pr_matematicas => $proventas->pr_matematicas,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1a')) }}
              </div>
      
              @if($proventas->pr_matematicas == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element">
                <select class="form-control input-sm" name="pr_titulo_mat" id="category1a" required="required">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_mat)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach

                 @foreach($titulo as $titulo)
                  @if($titulo->grado == 1)
                   @if($titulo->asignatura == 1)
                    @if($titulo->adopcion == $titulo->portafolio)
                    <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @else
                    @endif
                   @endif
                  @endif
                 @endforeach
                </select>
               </div>
    
              @else
    
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1a" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_mat" id="category1a" required="required">
                 <option value="{{$proventas->pr_titulo_mat}}" selected>{{$proventas->pr_titulo_mat}}</option>
                  @foreach($titulo as $titulo)
                   @if($titulo->grado == 1)
                    @if($titulo->asignatura == 1)
                     <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>

             @endif

  
       @if($proventas->pr_matematicas == 1) 

      
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat1" name="pr_vender_mat" class="form-control" value="{{$proventas->pr_vender_mat}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" value="{{$proventas->pr_muestra_mat}}" placeholder="Muestras solicitadas" type="text">
        </div>

    
 
       @else

   
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat1" name="pr_vender_mat" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputmat2" name="pr_muestra_mat" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

  
      
       @endif
   
            </div>


@endif

@if($proventas->pr_espanol == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ES</b> - Español </h4>
    
     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 2)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>


        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

    

</div>
@else

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>ES</b> - Español</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_espanol', [$proventas->pr_espanol => $proventas->pr_espanol,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1b')) }}
              </div>
      
              @if($proventas->pr_espanol == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element">
                <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_esp)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach
       
                 @foreach($titulof as $titulo)
                  @if($titulo->grado == 1)
                   @if($titulo->asignatura == 2)
                    @if($titulo->adopcion == $titulo->portafolio)
                    <option value="{{$titulo->id}}">{{$titulo->nombre}} </option>
                    @else
                    @endif
                   @endif
                  @endif
                 @endforeach
                </select>
               </div>
    
              @else
    
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1b" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_esp" id="category1b" required="required">
                 <option value="" disabled>Seleccione Titulo</option>
                  @foreach($titulof as $titulo)
                   @if($titulo->grado == 1)
                    @if($titulo->asignatura == 2)
                     <option value="{{$titulo->id}}">{{$titulo->nombre}} b</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
              @endif

@if($proventas->pr_espanol == 1) 

        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" value="{{$proventas->pr_vender_esp}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" value="{{$proventas->pr_muestra_esp}}" placeholder="Muestras solicitadas" type="text">
        </div>

    
       @else

    

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp1" name="pr_vender_esp" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputesp2" name="pr_muestra_esp" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

    
      
       @endif


            </div>

@endif








@if($proventas->pr_ciencias == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CS</b> - Ciencias Sociales </h4>
    
   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 3)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

  
</div>

@else
 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>CS</b> - Ciencias</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_ciencias', [$proventas->pr_ciencias => $proventas->pr_ciencias,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1c')) }}
              </div>
      
              @if($proventas->pr_ciencias == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element">
                <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_cie)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach

                 @foreach($titulof as $titulo)
                  @if($titulo->grado == 1)
                   @if($titulo->asignatura == 3)
                    @if($titulo->adopcion == $titulo->portafolio)
                    <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @else
                    @endif
                   @endif
                  @endif
                 @endforeach
                </select>
               </div>
        
              @else

               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1c" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_cie" id="category1c" required="required">
                 <option  selected>Seleccione titulo</option>
                  @foreach($titulof as $titulo)
                   @if($titulo->grado == 1)
                    @if($titulo->asignatura == 3)
                     <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
    
              @endif

              @if($proventas->pr_ciencias == 1) 

     

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" value="{{$proventas->pr_vender_cie}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" value="{{$proventas->pr_muestra_cie}}" placeholder="Muestras solicitadas" type="text">
        </div>

     
 
       @else

   
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie1" name="pr_vender_cie" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcie2" name="pr_muestra_cie" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

    
      
       @endif


            </div>

@endif




@if($proventas->pr_comprension == 0)

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>CL</b> - Comprensión Lectora </h4>
    
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 4)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
 

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

   


</div>

@else
   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
             <h4><b>CL</b> - Comprensión Lectora</h4>

              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               {{ Form::select('pr_comprension', [$proventas->pr_comprension => $proventas->pr_comprension,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
               ], null, array('class' => 'form-control', 'id' => 'category1d')) }}
              </div>
      
              @if($proventas->pr_comprension == 1)                               
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element">
                <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
                 @foreach($titulowebf as $tituloweb)
                  @if($tituloweb->id == $proventas->pr_titulo_com)
                   <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
                  @endif
                 @endforeach
       
                 @foreach($titulof as $titulo)
                  @if($titulo->grado == 1)
                   @if($titulo->asignatura == 4)
                    @if($titulo->adopcion == $titulo->portafolio)
                    <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @else
                    @endif
                   @endif
                  @endif
                 @endforeach
                </select>
               </div>
    
              @else
    
               <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1d" class="element" hidden>
                <select class="form-control input-sm" name="pr_titulo_com" id="category1d" required="required">
                 <option  selected>Seleccione titulo</option>
                  @foreach($titulof as $titulo)
                   @if($titulo->grado == 1)
                    @if($titulo->asignatura == 4)
                     <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
                    @endif
                   @endif
                  @endforeach
                </select>
               </div>
    
              @endif


              @if($proventas->pr_comprension == 1) 

     

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" value="{{$proventas->pr_vender_com}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" value="{{$proventas->pr_muestra_com}}" placeholder="Muestras solicitadas" type="text">
        </div>

    
       @else



        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom1" name="pr_vender_com" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputcom2" name="pr_muestra_com" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

    
      
       @endif


            </div>
@endif



@if($proventas->pr_interes == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General </h4>
    
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
               {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
               '1' => 'Libros y Libros',
               '0' => 'No meta',
                ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
              </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category1e" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 5)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>



        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

       

</div>
@else
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>IG</b> - Interes General</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_interes', [$proventas->pr_interes => $proventas->pr_interes,
       '1' => 'Libros y Libros',
               '0' => 'No meta',
       ], null, array('class' => 'form-control', 'id' => 'category1e')) }}
      </div>
      
     @if($proventas->pr_interes == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element">
     <select class="form-control input-sm" name="pr_titulo_int" id="category" required="required">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_int)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 5)
         @if($titulo->adopcion == $titulo->portafolio)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
         @else
         @endif
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1e" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_int" id="category" required="required">
      <option  selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 5)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @endif

    @if($proventas->pr_interes == 1) 

        

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" value="{{$proventas->pr_vender_int}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" value="{{$proventas->pr_muestra_int}}" placeholder="Muestras solicitadas" type="text">
        </div>

    
       @else

        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint1" name="pr_vender_int" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputint2" name="pr_muestra_int" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

    
       @endif


</div>

@endif


@if($proventas->pr_artistica == 0)

  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ART</b> - Artistica </h4>
    
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '1' => 'Libros y Libros',
               '0' => 'No meta',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category1f" required="required">
      <option value="0" selected>Seleccione editorial</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 6)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>

     
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

      

</div>
@else

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ATR</b> - Artistica</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_artistica', [$proventas->pr_artistica => $proventas->pr_artistica,
       '1' => 'Libros y Libros',
               '0' => 'No meta',
       ], null, array('class' => 'form-control', 'id' => 'category1f')) }}
      </div>
      
     @if($proventas->pr_artistica == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element">
     <select class="form-control input-sm" name="pr_titulo_art" id="category" required="required">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_art)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 6)
         @if($titulo->adopcion == $titulo->portafolio)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
         @else
         @endif
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1f" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_art" id="category" required="required">
      <option  selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 6)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
        @endif
        @endif
       @endforeach
     </select>
    </div>
    @endif

    @if($proventas->pr_artistica == 1) 

 
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" value="{{$proventas->pr_vender_art}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" value="{{$proventas->pr_muestra_art}}" placeholder="Muestras solicitadas" type="text">
        </div>

  
       @else


        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart1" name="pr_vender_art" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputart2" name="pr_muestra_art" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
        </div>

      
       @endif
</div>
@endif




@if($proventas->pr_ingles == 0)
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles </h4>
    
  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
   {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
   '1' => 'Libros y Libros',
   '0' => 'No meta',
    ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
  </div>
      
  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element" hidden>
   <select class="form-control input-sm" name="pr_titulo_ing" id="category1g" required="required">
    <option value="0" selected>Seleccione editorial</option>
     @foreach($titulof as $titulo)
      @if($titulo->grado == 1)
      @if($titulo->asignatura == 7)
       <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
      @endif
      @endif
     @endforeach
   </select>
  </div>



  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
   <input id="id_inputing1" name="pr_vender_ing" class="form-control" placeholder="Libros a vender" type="text" disabled>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
   <input id="id_inputing2" name="pr_muestra_ing" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
  </div>


</div>

@else
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
   <h4><b>ING</b> - Ingles</h4>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
       {{ Form::select('pr_ingles', [$proventas->pr_ingles => $proventas->pr_ingles,
       '1' => 'Libros y Libros',
               '0' => 'No meta',
       ], null, array('class' => 'form-control', 'id' => 'category1g')) }}
      </div>
      
     @if($proventas->pr_ingles == 1)                               
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element">
     <select class="form-control input-sm" name="pr_titulo_ing" id="category" required="required">
      @foreach($titulowebf as $tituloweb)
        @if($tituloweb->id == $proventas->pr_titulo_ing)
        <option value="{{$tituloweb->id}}" selected>{{$tituloweb->nombre}}</option>
        @endif
        @endforeach
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
        @if($titulo->asignatura == 7)
         @if($titulo->adopcion == $titulo->portafolio)
         <option value="{{$titulo->id}}">{{$titulo->nombre}}</option>
         @else
         @endif
        @endif
        @endif
       @endforeach
     </select>
    </div>
  </div>
    @else
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="1g" class="element" hidden>
     <select class="form-control input-sm" name="pr_titulo_ing" id="category" required="required">
      <option  selected>Seleccione titulo</option>
       @foreach($titulof as $titulo)
        @if($titulo->grado == 1)
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
         <input id="id_inputing1" name="pr_vender_ing" class="form-control" value="{{$proventas->pr_vender_ing}}" placeholder="Libros a vender" type="text">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing2" name="pr_muestra_ing" class="form-control" value="{{$proventas->pr_muestra_ing}}" placeholder="Muestras solicitadas" type="text">
        </div>

    
       @else

       
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing1" name="pr_vender_ing" class="form-control" placeholder="Libros a vender" type="text" disabled>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
         <input id="id_inputing2" name="pr_muestra_ing" class="form-control" placeholder="Muestras solicitadas" type="text" disabled>
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
