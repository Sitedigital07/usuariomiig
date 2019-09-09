<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title Page</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>




<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="Hello World"></script>
</body>
</html>


<div class="container-fluid">



<h1>Informe Representantes </h1>

<table id="testTable" class="table table-bordered table-striped table-hover">
<tbody>
<tr>
<td width="200">Estado {{$date}} {{$date_future}}</td>
<td width="250">Colegio</td>
<td colspan="2">Metas</td>
<td colspan="2">Adopciones</td>
<td colspan="2">Diferencia</td>
<td colspan="2">Esseg</td>
<td colspan="2">Muestra</td>
<td>Fecha Cierre (Metas)</td>
<td>Fecha Cierre (Adopciones)</td>

</tr>
<tr>
<td colspan="2"></td>
<td>Titulo</td>
<td>Valor</td>
<td>Titulo</td>
<td>Valor</td>
<td>Titulo</td>
<td>Valor</td>
<td>Presupuesto</td>
<td>Consumo</td>
<td>Presupuesto</td>
<td>Consumo</td>
<td></td>
<td></td>

</tr>
@foreach($colegios as $colegios)

<tr>

  @if(DB::table('fecha_adopcion')->where('colegio_id',$colegios->id)->exists())
 @foreach($fechaadopcion as $fechaadopcions)
  @if($colegios->id == $fechaadopcions->colegio_id)


  @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) <= 15)
    <td style="background: #FF8585">Estado {{ $fechaadopcions->fechaguard }}</td>
   @endif

   @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) >= 16 && round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) <= 29)
    @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400)>30)
  @else
    <td style="background: #FFCD85">Estado {{ $fechaadopcions->fechaguard }}</td>
    @endif
   @else
   @endif

   @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) >= 30)
    <td  style="background: #A1F792">Estado{{ $fechaadopcions->fechaguard }} </td>
   @endif


  @endif
 @endforeach
@else


  @if(DB::table('fecha_meta')->where('colegio_id',$colegios->id)->exists())

  @foreach($fechameta as $fechametassd)
  @if($colegios->id == $fechametassd->colegio_id)
  @if(round((strtotime($fechametassd->fecha) - time()) / 86400) <= 15)
    <td style="background: #FF8585">Estado {{round((strtotime($fechametassd->fecha) - time()) / 86400)}}   {{$fechametassd->fecha }}  </td>
  @endif

   @if(round((strtotime($fechametassd->fecha) - time()) / 86400) >= 16 && round((strtotime($fechametassd->fecha) - time()) / 86400) <= 29)
    @if(round((strtotime($fechametassd->fecha) - time()) / 86400)>30)
  @else
    <td style="background: #FFCD85">Estado {{round((strtotime($fechametassd->fecha) - time()) / 86400)}} {{ $fechametassd->fecha }} </td>
    @endif
   @else
   @endif

   @if(round((strtotime($fechametassd->fecha) - time()) / 86400) >= 30)
    <td  style="background: #A1F792">Estado {{round((strtotime($fechametassd->fecha) - time()) / 86400)}}  {{ $fechametassd->fecha }} </td>
   @endif
@endif
@endforeach

@else
<td style="background: #948e8e;color:#fff" class="text-center">Sin Fecha</td>
@endif

@endif

<td>{{$colegios->nombres}}</td>

@if(DB::table('proventas')->where('colegio_id',$colegios->id)->first())
@foreach($informes as $informesweb)
@if($colegios->id == $informesweb->colegio_id)
<td>{{$informesweb->suma_mat+$informesweb->suma_esp+$informesweb->suma_cie+$informesweb->suma_com+$informesweb->suma_art+$informesweb->suma_int+$informesweb->suma_ing}}</td>
<td>${{number_format($informesweb->vender_mat+$informesweb->vender_esp+$informesweb->vender_cie+$informesweb->vender_com+$informesweb->vender_art+$informesweb->vender_ing+$informesweb->vender_int,0,",",".")}}</td>
@endif
@endforeach
@else
<td>0</td>
<td>0</td>
@endif

@if(DB::table('campos')->where('colegio_id',$colegios->id)->first())
@foreach($informesadopcion as $informeswebadopcion) 
@if($colegios->id == $informeswebadopcion->colegio_id)
<td>{{$informeswebadopcion->suma_mat+$informeswebadopcion->suma_esp+$informeswebadopcion->suma_cie+$informeswebadopcion->suma_com+$informeswebadopcion->suma_art+$informeswebadopcion->suma_int+$informeswebadopcion->suma_ing}}</td>
<td>${{number_format($informeswebadopcion->vender_mat+$informeswebadopcion->vender_esp+$informeswebadopcion->vender_cie+$informeswebadopcion->vender_com+$informeswebadopcion->vender_art+$informeswebadopcion->vender_ing+$informeswebadopcion->vender_int,0,",",".")}}</td>
@endif
@endforeach
@else
<td>0</td>
<td>0</td>
@endif


@if(DB::table('campos')->where('colegio_id',$colegios->id)->first())
@foreach($informesesp as $informesesps)
@if($colegios->id == $informesesps->colegio_id)
<td>{{$informesesps->totalwebadop-$informesesps->totalweb}}</td>
<td>${{number_format($informesesps->totalwebadopvalor-$informesesps->totalwebvalor,0,",",".")}}</td>
@endif
@endforeach
@else
<td>0</td>
<td>0</td>
@endif

@if(DB::table('esseg')->where('colegio_id',$colegios->id)->first())
@foreach($esseg as $essegs)
@if($colegios->id == $essegs->colegio_id)
<td>${{number_format($essegs->esseg,0,",",".")}} </td>
@endif
@endforeach
@else
<td>0</td>
@endif


@if(DB::table('esseg_con')->where('miig',$colegios->codigo)->first())
@foreach($essegcon as $essegcons)
@if($colegios->codigo == $essegcons->miig)
<td>${{number_format($essegcons->valor,0,",",".")}}</td>
@endif
@endforeach
@else
<td>0</td>
@endif

@if(DB::table('proventas')->where('colegio_id',$colegios->id)->first())
@foreach($informes as $informesweb)
@if($colegios->id == $informesweb->colegio_id)
<td>{{$informesweb->muestra_mat+$informesweb->muestra_esp+$informesweb->muestra_cie+$informesweb->muestra_com+$informesweb->muestra_art+$informesweb->muestra_int+$informesweb->muestra_ing}}</td>
@endif
@endforeach
@else
<td>0</td>
@endif

@if(DB::table('campos')->where('colegio_id',$colegios->id)->first())
@foreach($informesadopcion as $informeswebadopcion) 
@if($colegios->id == $informeswebadopcion->colegio_id)
<td>{{$informeswebadopcion->muestra_mat+$informeswebadopcion->muestra_esp+$informeswebadopcion->muestra_cie+$informeswebadopcion->muestra_com+$informeswebadopcion->muestra_art+$informeswebadopcion->muestra_int+$informeswebadopcion->muestra_ing}}</td>
@endif
@endforeach
@else
<td>0</td>
@endif

@if(DB::table('fecha_meta')->where('colegio_id',$colegios->id)->first())
@foreach($fechameta as $fechametas)
@if($colegios->id == $fechametas->colegio_id)
<td>{{$fechametas->fecha}} </td>
@endif
@endforeach
@else
<td>Sin Fecha</td>
@endif


@if(DB::table('fecha_meta')->where('colegio_id',$colegios->id)->first())

@if(DB::table('fecha_adopcion')->where('colegio_id',$colegios->id)->first())
 @foreach($fechaadopcion as $fechaadopcions)
  @if($colegios->id == $fechaadopcions->colegio_id)



      @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) < 0 && DB::table('campos')->where('colegio_id','=',$colegios->id)->count() == 0)
     <td style="background:#FF8585"> dias:{{round((strtotime($fechaadopcions->fechaguard) - time()) / 86400)}}<br> Adopc {{DB::table('campos')->where('colegio_id','=',$colegios->id)->count()}} </td>
      @endif


     @if(DB::table('fecha_adopcion')->where('colegio_id','=',$colegios->id)->count() >= 1 && round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) > 1 && DB::table('campos')->where('colegio_id','=',$colegios->id)->count() == 0)
      <td style="background:#FFCD85"> Dias:{{round((strtotime($fechaadopcions->fechaguard) - time()) / 86400)}}<br> # fechas: {{DB::table('fecha_adopcion')->where('colegio_id','=',$colegios->id)->count()}} <br>
      # Adopc: {{DB::table('campos')->where('colegio_id','=',$colegios->id)->count()}} <br>{{DB::table('fecha_adopcion')->count() >= 1 && round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) > 1 && DB::table('campos')->count() == 0}}</td>
     @endif

        @if(round((strtotime($fechaadopcions->fechaguard) - time()) / 86400) < 0 && DB::table('campos')->where('colegio_id','=',$colegios->id)->count() >= 1)
      <td style="background:#A1F792">dias:{{round((strtotime($fechaadopcions->fechaguard) - time()) / 86400)}} <br>Adop:{{DB::table('proventas')->where('colegio_id','=',$colegios->id)->count()}}</td>
     @endif

   @endif

@endforeach

@else

  @foreach($fechameta as $fechametasweb)
  @if($colegios->id == $fechametasweb->colegio_id)




      @if(round((strtotime($fechametasweb->fecha) - time()) / 86400) < 0 && DB::table('campos')->where('colegio_id','=',$colegios->id)->count() == 0)
     <td style="background:#FF8585"> dias:{{round((strtotime($fechametasweb->fecha) - time()) / 86400)}}<br> Adopc {{DB::table('campos')->where('colegio_id','=',$colegios->id)->count()}} </td>
      @endif


     @if(DB::table('fecha_meta')->where('colegio_id','=',$colegios->id)->count() <= 1 && round((strtotime($fechametasweb->fecha) - time()) / 86400) > 1 && DB::table('proventas')->where('colegio_id','=',$colegios->id)->count() == 0)
      <td style="background:#FFCD85"> Dias:{{round((strtotime($fechametasweb->fecha) - time()) / 86400)}}<br> # fechas: {{DB::table('fecha_meta')->where('colegio_id','=',$colegios->id)->count()}} <br>
      # Adopc: {{DB::table('proventas')->where('colegio_id','=',$colegios->id)->count()}} </td>
     @endif

        @if(round((strtotime($fechametasweb->fecha) - time()) / 86400) < 0 && DB::table('campos')->where('colegio_id','=',$colegios->id)->count() >= 1)
      <td style="background:#A1F792">dias:{{round((strtotime($fechametasweb->fecha) - time()) / 86400)}} <br>Adop:{{DB::table('campos')->where('colegio_id','=',$colegios->id)->count()}}</td>
     @endif

   @endif

@endforeach




@endif


@else
<td style="background: #948e8e;color:#fff" class="text-center">Sin Fecha</td>
@endif
@endforeach

</tr>
<tr>
<td width="208" colspan="2"><b>TOTALES</b></td>
@if(DB::table('proventas')->where('representante_id','=',Request::segment(3))->count() == 0)
<td><b>0</b></td>
<td><b>0</b></td>
@else
@foreach($informestotales as $informestotales)
<td><b>{{$informestotales->total_met}}</b></td>
<td><b>${{number_format($informestotales->total_metval,0,",",".")}}</b></td>
@endforeach
@endif
@if(DB::table('campos')->where('representante_id','=',Request::segment(3))->count() == 0)
<td><b>0</b></td>
<td><b>0</b></td>
@else
@foreach($informesadopciontotales as $informesadopciontotales)
<td><b>{{$informesadopciontotales->total_adop}}</b></td>
<td><b>${{number_format($informesadopciontotales->total_adopval,0,",",".")}}</b></td>
@endforeach
@endif

@if(DB::table('campos')->where('representante_id','=',Request::segment(3))->count() == 0)
<td><b>0</b></td>
<td><b>0</b></td>
@else
<td><b>{{$informesadopciontotales->total_adop-$informestotales->total_met}}</b></td>
<td><b>${{number_format($informesadopciontotales->total_adopval-$informestotales->total_metval,0,",",".")}}</b></td>
@endif
<td><b>${{number_format(DB::table('esseg')->where('representante_id','=',Request::segment(3))->sum('esseg'),0,",",".")}}</b></td>
<td><b>${{number_format(DB::table('esseg_con')->where('representante_id','=',Request::segment(3))->sum('valor'),0,",",".")}}</b></td>
@foreach($presupuestomet as $presupuestometd)
<td><b>{{$presupuestometd->muestra_mat+$presupuestometd->muestra_esp+$presupuestometd->muestra_cie+$presupuestometd->muestra_com+$presupuestometd->muestra_int+$presupuestometd->muestra_ing+$presupuestometd->muestra_art}}</b></td>
@endforeach
@foreach($presupuestoadop as $presupuestoadops)
<td><b>{{$presupuestoadops->muestra_mat+$presupuestoadops->muestra_esp+$presupuestoadops->muestra_cie+$presupuestoadops->muestra_com+$presupuestoadops->muestra_int+$presupuestoadops->muestra_ing+$presupuestoadops->muestra_art}}</b></td>
@endforeach
<td></td>
<td></td>

</tr>
</tbody>
</table>



</div>




