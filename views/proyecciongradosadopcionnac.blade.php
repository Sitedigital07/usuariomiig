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
@if (DB::table('campos')->where('cierre', '=', 1)->where('ano', '=', $anon->ano)->where('colegio_id', '=', Request::segment(2))->exists())
Usted ya realizo el cierre para este colegio
@else
{{$total*10/100}}
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
    
    <h3 class="widget-content animation-pullDown visible-lg">
     Año <strong>Auditado</strong> 
     @foreach($ano as $ano)
     {{$ano->ano}}
     @endforeach
     <small>Registro actual</small>
    </h3>
   </div>
  </a>
 </div>


 <div class="col-sm-4">
  <a href="" class="widget widget-hover-effect1">
   <div class="widget-simple">
    
    <div class="widget-icon pull-left themed-background animation-fadeIn">
     <i class="fa fa-calendar"></i>
    </div>
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    
    <h3 class="widget-content animation-pullDown visible-lg">
      @foreach($ventas as $ventas)
      @if($ventas->miig == 'null')
      Consumo Esseg Nulo
      @else
     Consumo ESSEG <b>{{$ventas->valor}}</b>
     @endif
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
     <i class="fa fa-expeditedssl"></i>
    </div>
  
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    <h3 class="widget-content animation-pullDown visible-lg">
     <strong>Fecha</strong> 
     <small>Registro actual</small>
    </h3>
   </div>
  </a>
 </div>

 
@foreach($anoweb as $anowebs)
@endforeach

@if (DB::table('fecha_adopcion')->where('ano','=', $anowebs->ano)->where('colegio_id', '=', Request::segment(2))->exists())


@foreach($fecha as $fechas)

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearfecha'))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

            <div class="form-group">
              <label for="input" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fecha" id="input" class="form-control" value="{{$fechas->fecha}}" required="required" title="">
              </div>
            </div>

              {{Form::hidden('ano', $fechas->ano, array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" disabled>Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
@endforeach

@else

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearfecha'))) }}
                                      
            
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
        <button type="button" class="btn btn-default" data-dismiss="modal" disabled>Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

@endif





 @foreach($anoe as $anoe)
   
   @endforeach

@if (DB::table('campos')->where('grado_id', '=', 1)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasprimero  as $proventasprimero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradowebasinac/{{$proventasprimero}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Primero</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-primeroadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Primero</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 2)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassegundo  as $proventassegundo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-segundoasinac/{{$proventassegundo}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Segundo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
 @endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-segundoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Segundo</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif



@if (DB::table('campos')->where('grado_id', '=', 3)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventastercero  as $proventastercero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-terceroasinac/{{$proventastercero}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Tercero</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
 @endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-terceroadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Tercero</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif



@if (DB::table('campos')->where('grado_id', '=', 4)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventascuarto as $proventascuarto)
<div class="col-sm-12 col-lg-4">
   <a href="/editar-gradoweb-cuartoasinac/{{$proventascuarto}}" class="widget widget-hover-effect1" style="background:#f39c12">
  <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Cuarto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-cuartoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Cuarto</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 5)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasquinto as $proventasquinto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-quintoasinac/{{$proventasquinto}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Quinto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-quintoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Quinto</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif

@if (DB::table('campos')->where('grado_id', '=', 6)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassexto as $proventassexto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-sextoasinac/{{$proventassexto}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Sexto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-sextoadopcion/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Sexto</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif

@if (DB::table('campos')->where('grado_id', '=', 7)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasseptimo as $proventasseptimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-septimoasinac/{{$proventasseptimo}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Septimo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-septimoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Septimo</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 8)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasoctavo as $proventasoctavo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-octavoasinac/{{$proventasoctavo}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Octavo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-octavoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Octavo</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 9)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasnoveno as $proventasnoveno)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-novenoasinac/{{$proventasnoveno}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado noveno</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-novenoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Noveno</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 10)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasdecimo as $proventasdecimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-decimoasinac/{{$proventasdecimo}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Decimo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-decimoadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Decimo</strong>
      <small>Registro inicial</small>
     </h4>
   </div>
  </a>
 </div>
@endif


@if (DB::table('campos')->where('grado_id', '=', 11)->where('ano','=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasonce as $proventasonce)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-onceasinac/{{$proventasonce}}" class="widget widget-hover-effect1" style="background:#f39c12">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Once</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-onceadopcionnac/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Once</strong>
      <small>Registro inicial</small>
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
