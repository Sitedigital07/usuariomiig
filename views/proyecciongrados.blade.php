@extends ('adminsite.auditor')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent

 <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>


@stop
@section('contenido')

<div class="container">
    
@if (DB::table('proventas')->where('grado_id', '=', 1)->where('colegio_id', '=', Request::segment(2))->exists())
@foreach($proventas as $proventas)
@if($proventas->grado_id == 1)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Primero</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-primero/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 2)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-segundo/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Segundo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
 <div class="col-sm-12 col-lg-4">
  <a href="/grado-segundo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 3)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-tercero/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Tercero</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-tercero/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 4)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-cuarto/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Cuarto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-cuarto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 5)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-quinto/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Quinto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-quinto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 6)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-sexto/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Sexto</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-sexto/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 7)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-septimo/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Septimo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-septimo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 8)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-octavo/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Octavo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-octavo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 9)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-noveno/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado noveno</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-noveno/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 10)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-decimo/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Decimo</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-decimo/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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
@foreach($proventasf as $proventas)
@if($proventas->grado_id == 11)
<div class="col-sm-12 col-lg-4">
  <a href="/editar-gradoweb-once/{{$proventas->id}}" class="widget widget-hover-effect1" style="background:#a5ae27">
   <div class="widget-simple">
    <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
     <h4 class="widget-content widget-content-light">
      <strong>Grado Once</strong>
      <small>Editar Registro</small>
     </h4>
   </div>
  </a>
 </div>
@endif
@endforeach
@else
  <div class="col-sm-12 col-lg-4">
  <a href="/grado-once/{{Request::segment(2)}}" class="widget widget-hover-effect1 themed-background">
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



@foreach($proventasprimero  as $proventasprimero)
{{$proventasprimero}}
@endforeach





<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


@stop


