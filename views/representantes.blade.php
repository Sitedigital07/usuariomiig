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
                                    <a href="/representantes"><i class="gi gi-charts"></i> Representantes</a>
                                </li>
                                <li>
                                    <a href="/crear-representante"><i class="fa fa-home"></i> Crear representantes</a>
                                </li>
                            </ul>
                        </div>




	<div class="container">
          <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Representantes</strong> registrados</h2>
                            </div>
                            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Agencia</th>
                                            <th>Fecha</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($representantes as $representantes)
                                        <tr>
                                            <td class="text-center">{{$representantes->nombre}}</td>
                                            <td class="text-center">{{$representantes->n_ciudad}}</td>
                                            <td>{{$representantes->email}}</td>
                                            <td class="text-center">
                                              <a href="/colegio-representante/{{$representantes->id}}" type="button" class="btn btn-warning">Colegios Asigandos</a>
											  @if (App\User::where('identidad', '=', $representantes->id)->exists()) 
											  <a href="#" type="button" class="btn btn-success">Usuario Generado</a>
											  @else
										      <a href="/generar-usuario/{{$representantes->id}}" type="button" class="btn btn-info">Generar usuario</a>
											  @endif
                                              <a href="/editar-representante/{{$representantes->id}}" type="button" class="btn btn-info">Editar</a>
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