@extends ('adminsite.asistente')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent

 <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>


@stop
@section('contenido')
@foreach($anon as $anon)
@if (DB::table('proventas')->where('cierre', '=', 1)->where('ano', '=', $anon->ano)->where('colegio_id', '=', Request::segment(2))->exists())
Usted ya realizo el cierre para este colegio
@else


{{$total}}
<div class="container">

 <div class="col-sm-4">
  <a href="" class="widget widget-hover-effect1">
   <div class="widget-simple">
    
    <div class="widget-icon pull-left themed-background animation-fadeIn">
     <i class="fa fa-calendar"></i>
    </div>
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    
    <h3 class="widget-content animation-pullDown">
      <strong>Temporada</strong> 
     @foreach($ano as $ano)
     {{$ano->ano}}
     @endforeach
     <small>Registro actual</small>
    </h3>
   </div>
  </a>
 </div>



  <div class="col-sm-4">         

  <a href="#modal-id" data-toggle="modal" class="widget widget-hover-effect1">
   <div class="widget-simple">
    <div class="widget-icon pull-left themed-background animation-fadeIn">
    <i class="fa fa-usd"></i>
    </div>
  
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    <h3 class="widget-content animation-pullDown">
     <strong>Presupuesto ESSEG</strong> 
     <small>Registrar presupuesto</small>
    </h3>
   </div>
  </a>
 </div>


   <div class="col-sm-4">         

  <a href="#modal-ida" data-toggle="modal" class="widget widget-hover-effect1">
   <div class="widget-simple">
    <div class="widget-icon pull-left themed-background animation-fadeIn">
     <i class="fa fa-calendar-check-o"></i>
    </div>
  
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    <h3 class="widget-content animation-pullDown">
     <strong>Fecha de cierre</strong> 
     <small>Registrar fecha de cierre</small>
    </h3>
   </div>
  </a>
 </div>



@foreach($anoweb as $anowebs)
@endforeach

@if (DB::table('fecha_meta')->where('ano','=', $anowebs->ano)->where('colegio_id', '=', Request::segment(2))->exists())


@foreach($fecha as $fecha)

<div class="modal fade" id="modal-ida">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Fecha de cierre</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/actualizarfechameta',$fecha->id))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

            <div class="form-group">
              <label for="input" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fecha" id="input" class="form-control" value="{{$fecha->fecha}}" required="required" title="">
              </div>
            </div>

              {{Form::hidden('ano', $fecha->ano, array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@endforeach

@else

<div class="modal fade" id="modal-ida">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Fecha de Cierre</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearfechameta'))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

           
            <div class="form-group">
              <label for="input" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fecha" id="input" class="form-control" value="" required="required" title="">
              </div>
            </div>

              @foreach($anoweb as $anoweb)
            {{Form::hidden('ano', $anoweb->ano, array('class' => 'form-control','placeholder'=>''))}}  
              @endforeach
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

@endif


 

 @foreach($anoe as $anoe)
   
   @endforeach
   @if (DB::table('proventas')->where('ano', '=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($identificador as $identificador)

@if (DB::table('esseg')->where('ano', '=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($esseg as $esseg)
@endforeach
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><b>Actualizar valor Esseg</b></h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/updateesseg',$esseg->id))) }}
                                       
          <div class="form-group">
           <label class="col-md-3 control-label" for="example-text-input">Cantidad Esseg</label>
            <div class="col-md-9">
              {{Form::number('esseg', $esseg->esseg, array('class' => 'form-control','placeholder'=>'','max'=>$total*10/100))}} 
            </div>
          </div>
    
         
            {{Form::hidden('ano', $ano->ano, array('class' => 'form-control','placeholder'=>''))}}  
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@else
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><b>Registrar presupuesto ESSEG</b></h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearesseg'))) }}
                                       
          <div class="form-group">
           <label class="col-md-3 control-label" for="example-text-input">Presupuesto Esseg</label>
            <div class="col-md-9">
              {{Form::number('esseg', '', array('class' => 'form-control','placeholder'=>'', 'max'=>$total*10/100))}} 
            </div>
          </div>
    
         
            {{Form::hidden('ano', $ano->ano, array('class' => 'form-control','placeholder'=>''))}}  
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@endif
@endforeach
@else

@if($identificador == '')
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Presupuesto ESSEG</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/actualizarcierrecolegio',$identificador))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

            <h2>Para ingresar el valor de presupuesto ESSEG debe primero registrar la totalidad de metas del colegio.</h2>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@else
@foreach($identificador as $identificador)
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Fecha de cierre</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/actualizarcierrecolegio',$identificador))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

            <h2>Para realizar cierre debe registrar datos de venta para el colegio</h2>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" disabled>Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@endforeach
@endif

@endif

@if (DB::table('proventas')->where('grado_id', '=', 1)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasprimero  as $proventasprimero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb/{{$proventasprimero}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Primero</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-primero/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Primero</strong>

     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 2)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassegundo  as $proventassegundo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-segundo/{{$proventassegundo}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Segundo</strong>

     </h4>
   </div>
  </a>
 </div>
 @endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-segundo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Segundo</strong>

     </h4>
   </div>
  </a>
 </div>
@endif



@if (DB::table('proventas')->where('grado_id', '=', 3)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventastercero  as $proventastercero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-tercero/{{$proventastercero}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Tercero</strong>

     </h4>
   </div>
  </a>
 </div>
 @endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-tercero/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Tercero</strong>

     </h4>
   </div>
  </a>
 </div>
@endif



@if (DB::table('proventas')->where('grado_id', '=', 4)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventascuarto as $proventascuarto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-cuarto/{{$proventascuarto}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Cuarto</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-cuarto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Cuarto</strong>

     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 5)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasquinto as $proventasquinto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-quinto/{{$proventasquinto}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Quinto</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-quinto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Quinto</strong>

     </h4>
   </div>
  </a>
 </div>
@endif

@if (DB::table('proventas')->where('grado_id', '=', 6)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassexto as $proventassexto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-sexto/{{$proventassexto}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Sexto</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-sexto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Sexto</strong>

     </h4>
   </div>
  </a>
 </div>
@endif

@if (DB::table('proventas')->where('grado_id', '=', 7)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasseptimo as $proventasseptimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-septimo/{{$proventasseptimo}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Septimo</strong>
 
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-septimo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Septimo</strong>

     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 8)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasoctavo as $proventasoctavo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-octavo/{{$proventasoctavo}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Octavo</strong>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-octavo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Octavo</strong>

     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 9)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasnoveno as $proventasnoveno)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-noveno/{{$proventasnoveno}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado noveno</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-noveno/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Noveno</strong>
   
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 10)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasdecimo as $proventasdecimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-decimo/{{$proventasdecimo}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Decimo</strong>

     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-decimo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Decimo</strong>

     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('proventas')->where('grado_id', '=', 11)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasonce as $proventasonce)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-once/{{$proventasonce}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Once</strong>
 
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-once/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Once</strong>

     </h4>
   </div>
  </a>
 </div>

@endif

</div>
@endif
@endforeach





<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


@stop


