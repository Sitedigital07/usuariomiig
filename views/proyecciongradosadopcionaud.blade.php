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


<div class="container">


 <div class="col-sm-12">                              <!-- Widget -->
  <a href="page_widgets_stats.html" class="widget widget-hover-effect1">
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



 @foreach($anoe as $anoe)
   
   @endforeach
   @if (DB::table('proventas')->where('ano', '=', $anoe->ano)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($identificador as $identificador)

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/actualizarcierrecolegio',$identificador))) }}
                                       
          <div class="form-group">
           <label class="col-md-3 control-label" for="example-text-input">Nombres</label>
            <div class="col-md-9">
             {{ Form::select('cierre', ['' => '-- Seleccione Cierre --',
                '1' => 'Cerrar Colegio'
                ], null, array('class' => 'form-control')) }}
            </div>
          </div>
            
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
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/actualizarcierrecolegio',$identificador))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

            <h2>Para realizar cierre debe registrar datos de venta para el colegio</h2>

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

@if (DB::table('proventas')->where('grado_id', '=', 1)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasprimero  as $proventasprimero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradowebaud/{{$proventasprimero}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-primeroadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 2)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassegundo  as $proventassegundo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-segundoaud/{{$proventassegundo}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-segundoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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



@if (DB::table('proventas')->where('grado_id', '=', 3)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventastercero  as $proventastercero)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-terceroaud/{{$proventastercero}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-terceroadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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



@if (DB::table('proventas')->where('grado_id', '=', 4)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventascuarto as $proventascuarto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-cuartoaud/{{$proventascuarto}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-cuartoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 5)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasquinto as $proventasquinto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-quintoaud/{{$proventasquinto}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-quintoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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

@if (DB::table('proventas')->where('grado_id', '=', 6)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventassexto as $proventassexto)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-sextoaud/{{$proventassexto}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-sextoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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

@if (DB::table('proventas')->where('grado_id', '=', 7)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasseptimo as $proventasseptimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-septimoaud/{{$proventasseptimo}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-septimoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 8)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasoctavo as $proventasoctavo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-octavoaud/{{$proventasoctavo}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-octavoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 9)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasnoveno as $proventasnoveno)

<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-novenoaud/{{$proventasnoveno}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-novenoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 10)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasdecimo as $proventasdecimo)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-decimoaud/{{$proventasdecimo}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-decimoadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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


@if (DB::table('proventas')->where('grado_id', '=', 11)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventasonce as $proventasonce)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-onceaud/{{$proventasonce}}" class="widget widget-hover-effect1" style="background:#f39c12">
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
  <a href="/grado-onceadopcionaud/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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



@endforeach





<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


@stop


