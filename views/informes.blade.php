
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


<div class="container">
	
<h1>Informe Representantes</h1>


<table id="tabla1" class="table table-bordered table-striped table-hover">
	<tbody>
		<tr>
			<td>ID</td>
			<td>Colegio</td>
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
		 @foreach($informes as $informesweb)
		  @foreach($informesadopcion as $informeswebadopcion)	
		<tr>
			<td>{{$colegios->id}}</td>
			<td>{{$colegios->nombres}}</td>
			@if($colegios->id == $informesweb->colegio_id)
			<td>{{$informesweb->suma_mat+$informesweb->suma_esp+$informesweb->suma_cie+$informesweb->suma_com+$informesweb->suma_art+$informesweb->suma_int+$informesweb->suma_ing}}</td>
			<td>{{$informesweb->vender_mat+$informesweb->vender_esp+$informesweb->vender_cie+$informesweb->vender_com+$informesweb->vender_art+$informesweb->vender_ing+$informesweb->vender_int}}</td>
			@endif
			@if($colegios->id == $informeswebadopcion->colegio_id)
			<td>{{$informeswebadopcion->suma_mat+$informeswebadopcion->suma_esp+$informeswebadopcion->suma_cie+$informeswebadopcion->suma_com+$informeswebadopcion->suma_art+$informeswebadopcion->suma_int+$informeswebadopcion->suma_ing}}</td>
			<td>{{$informeswebadopcion->vender_mat+$informeswebadopcion->vender_esp+$informeswebadopcion->vender_cie+$informeswebadopcion->vender_com+$informeswebadopcion->vender_art+$informeswebadopcion->vender_ing+$informeswebadopcion->vender_int}}</td>
			
			<td>{{$informesweb->suma_mat+$informesweb->suma_esp+$informesweb->suma_cie+$informesweb->suma_com+$informesweb->suma_art+$informesweb->suma_int+$informesweb->suma_ing-$informeswebadopcion->suma_mat+$informeswebadopcion->suma_esp+$informeswebadopcion->suma_cie+$informeswebadopcion->suma_com+$informeswebadopcion->suma_art+$informeswebadopcion->suma_int+$informeswebadopcion->suma_ing}}</td>
			<td>{{$informesweb->vender_mat+$informesweb->vender_esp+$informesweb->vender_cie+$informesweb->vender_com+$informesweb->vender_art+$informesweb->vender_ing+$informesweb->vender_int-$informeswebadopcion->vender_mat+$informeswebadopcion->vender_esp+$informeswebadopcion->vender_cie+$informeswebadopcion->vender_com+$informeswebadopcion->vender_art+$informeswebadopcion->vender_ing+$informeswebadopcion->vender_int}}</td>
			<td></td>
			<td></td>
			<td>{{$informesweb->muestra_mat+$informesweb->muestra_esp+$informesweb->muestra_cie+$informesweb->muestra_com+$informesweb->muestra_art+$informesweb->muestra_int+$informesweb->muestra_ing}}</td>
			<td>{{$informeswebadopcion->muestra_mat+$informeswebadopcion->muestra_esp+$informeswebadopcion->muestra_cie+$informeswebadopcion->muestra_com+$informeswebadopcion->muestra_art+$informeswebadopcion->muestra_int+$informeswebadopcion->muestra_ing}}</td>
			@endif
			<td></td>
			<td></td>
		  @endforeach
	     @endforeach
	    @endforeach
		</tr>
	</tbody>
</table>


</div>