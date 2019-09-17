@extends ('adminsite.asistente')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent

 <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>


@stop

@foreach($colegios as $colegiosa)
@if($colegiosa->representante_id == Auth::user()->id)



@section('contenido')
@foreach($anon as $anon)
@if (DB::table('proventas')->where('cierre', '=', 1)->where('ano', '=', $anon->ano)->where('colegio_id', '=', Request::segment(2))->exists())
Usted ya realizo el cierre para este colegio
@else


{{$total}}





  <div class="container">
   <?php $status=Session::get('status');?>

    @if($status=='ok_create')
     <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Contenido registrada con éxito</strong> SD ...
     </div>
    @endif

    @if($status=='ok_danger')
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Usted no registro Información para este grado</strong> SD ...
     </div>
    @endif

    @if($status=='ok_update')
     <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Contenido actualizado con éxito</strong> SD ...
     </div>
    @endif
  </div>
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

@foreach($anoweb as $anowebsa)

@endforeach

@if(DB::table('esseg')->where('ano','=',$anowebsa->ano)->where('colegio_id','=',Request::segment(2))->count() == 1)
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
@else
 <div class="col-sm-4">         
  <a href="#modal-id" data-toggle="modal" class="widget widget-hover-effect1">
   <div class="widget-simple">
    <div class="widget-icon pull-left themed-background animation-fadeIn" style="background: red">
    <i class="fa fa-usd"></i>
    </div>
  
    <div class="pull-right">
     <span id="mini-chart-brand"></span>
    </div>
    <h3 class="widget-content animation-pullDown">
     <strong style="color: red">Sin Presupuesto ESSEG</strong> 
     <small>Registrar presupuesto</small>
    </h3>
   </div>
  </a>
 </div>
@endif

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
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'onsubmit' => 'return checkSubmit()', 'url' => array('/actualizarfechameta',$fecha->id))) }}
                                      
            
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  
    @foreach($anoesma as $anoesmad)

     @endforeach 
     @if(DB::table('cierre')->where('colegio_id', '=', Request::segment(2))->where('ano', '=', $anoesmad->ano)->where('cierre','=',1)->exists())
            <div class="form-group">
              <label for="input" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fecha" id="input" class="form-control" value="{{$fecha->fecha}}" required="required" title="" disabled="">
              </div>
            </div>
          @else
          <div class="form-group">
              <label for="input" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fecha" id="input" class="form-control" value="{{$fecha->fecha}}" required="required" title="">
              </div>
            </div>
          @endif

              {{Form::hidden('ano', $fecha->ano, array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             

       @if (DB::table('cierre')->where('colegio_id', '=', Request::segment(2))->where('ano', '=', $anoesmad->ano)->where('cierre','=',1)->exists())
       @else
        <button type="submit" class="btn btn-primary" id="btsubmit">Aceptar</button>
        @endif
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
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'onsubmit' => 'return checkSubmit()', 'url' => array('/crearfechameta'))) }}
                                      
            
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

        <button type="submit" class="btn btn-primary" id="btsubmit">Aceptar</button>
   
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

@endif


 

 @foreach($anoe as $anoe)  
   @endforeach

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
       {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'onsubmit' => 'return checkSubmita()', 'url' => array('/updateesseg',$esseg->id))) }}
                                       
        <div class="form-group">
         <label class="col-md-3 control-label" for="example-text-input">Cantidad Esseg</label>
         @foreach($anoesma as $anoesma)
         @endforeach
                  @if (DB::table('cierre')->where('colegio_id', '=', Request::segment(2))->where('ano', '=', $anoesma->ano)->where('cierre','=',1)->exists()) 
         <div class="col-md-9">
          {{Form::number('esseg', $esseg->esseg, array('class' => 'form-control','required' => 'required','disabled' => 'disabled','placeholder'=>'Ingrese valor esseg','min'=>'0','max'=>$total*8/100))}} 
         </div>
         @else
         <div class="col-md-9">
          {{Form::number('esseg', $esseg->esseg, array('class' => 'form-control','required' => 'required','placeholder'=>'Ingrese valor esseg','min'=>'0','max'=>$total*8/100))}} 
         </div>
         @endif
        
         @foreach($colegios as $colegios)
         {{Form::hidden('ciudad', $colegios->ciudad_id, array('class' => 'form-control','placeholder'=>''))}} 
         @endforeach 
         {{Form::hidden('ano', $ano->ano, array('class' => 'form-control','placeholder'=>''))}}  
         {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

         </div>
        </div>
      

        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       

         @if (DB::table('cierre')->where('colegio_id', '=', Request::segment(2))->where('ano', '=', $anoesma->ano)->where('cierre','=',1)->exists()) 
         @else
            {{Form::submit('Aceptar', array('class' => 'btn btn-primary','id' => 'btsubmita')  )}}
         @endif
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
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'onsubmit' => 'return checkSubmita()', 'url' => array('/crearesseg'))) }}


                                       
          <div class="form-group">
           <label class="col-md-3 control-label" for="example-text-input">Presupuesto Esseg</label>
            <div class="col-md-9">
              {{Form::number('esseg', '', array('class' => 'form-control','onsubmit' => 'return checkSubmit()','required' => 'required','placeholder'=>'Ingrese valor esseg','min'=>'0','max'=>$total*8/100))}} 
            </div>
          </div>
    
   @foreach($colegios as $colegios)
            {{Form::hidden('ciudad', $colegios->ciudad_id, array('class' => 'form-control','placeholder'=>''))}} 
            @endforeach 
            {{Form::hidden('ano', $ano->ano, array('class' => 'form-control','placeholder'=>''))}}  
            {{Form::hidden('colegio', Request::segment(2), array('class' => 'form-control','placeholder'=>''))}}  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btsubmita">Aceptar</button>
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>
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
      <strong>Grado Séptimo</strong>
 
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
      <strong>Grado Séptimo</strong>

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
      <strong>Grado Décimo</strong>

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
      <strong>Grado Décimo</strong>

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

    <script type="text/javascript">
function checkSubmit() {
    document.getElementById("btsubmit").value = "Enviando...";
    document.getElementById("btsubmit").disabled = true;
    return true;
}
  </script>

    <script type="text/javascript">
function checkSubmita() {
    document.getElementById("btsubmita").value = "Enviando...";
    document.getElementById("btsubmita").disabled = true;
    return true;
}
  </script>
@stop



@else

@section('contenido')
<h1 class="text-center"><b>Usted no tiene permisos para gestionar este colegio</b></h1>
@stop

@endif
@endforeach