@extends ('adminsite.presentacion')

<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent
@stop

@section('contenido')


<div class="content-header">
                            <ul class="nav-horizontal text-center">
                                <li class="active">
                                    <a href="/carga-esseg"><i class="fa fa-building"></i> Esseg</a>
                                </li>
                                <li>
                                    <a href="/excel-esseg"><i class="fa fa-download"></i> Importar Exportar</a>
                                </li>
                                 <li>
                                    <a href="/eliminar-esseg"><i class="fa fa-download"></i> Eliminar Esseg</a>
                                </li>
                                <li>
                                    <a href="/carga-essegreg"><i class="fa fa-balance-scale"></i> Esseg Registrado</a>
                                </li>
                            </ul>
                        </div>

  
 <div class="container">
   <?php $status=Session::get('status');?>

    @if($status=='ok_create')
     <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Colegio</strong> registrada con éxito.
     </div>
    @endif

    @if($status=='ok_delete')
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Colegio</strong> actualizado con éxito.
     </div>
    @endif

    @if($status=='ok_update')
     <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Colegio</strong> actualizado con éxito.
     </div>
    @endif
  </div>





	<div class="container">
          <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Colegios</strong> registrados</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                          
                                            <th class="text-center">ID</th>
                                            <th class="text-center">DANE</th>
                                            <th class="text-center">Valor</th>
                                            <th class="text-center">Colegio</th>
                                            <th class="text-center">Identificador</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($datos as $datos)
                                        <tr>
                                 
                                            <td class="text-center">{{$datos->id}}</td>
                                            <td class="text-center">{{$datos->miig}}</td>
                                            <td class="text-center">${{number_format($datos->valor,0,",",".")}}</td>
                                            @foreach($colegio as $colegiosa)
                                            @if($colegiosa->codigo == $datos->miig)
                                            <td class="text-center">{{$colegiosa->nombres}}</td>
                                         @else

                                   
                                                @endif
                                             @endforeach
                                        <td class="text-center">{{$datos->identificador}}</td>
                             

                                            <td class="text-center">
                                               <a href="/editar-esseg/{{$datos->id}}" class="btn btn-primary"><i class="fa fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
  </div>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
       


@stop



