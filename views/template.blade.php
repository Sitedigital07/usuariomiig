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
                                    <a href="/usuarios"><i class="fa fa-users"></i> Usuarios</a>
                                </li>
                                <li>
                                    <a href="/crear-usuario"><i class="fa fa-user-plus"></i> Crear usuario</a>
                                </li>
                            </ul>
                        </div>
  

<div class="container">
   <?php $status=Session::get('status');?>

    @if($status=='ok_create')
     <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Usuario</strong> registrada con éxito.
     </div>
    @endif

    @if($status=='ok_delete')
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Usuario</strong> eliminado con éxito.
     </div>
    @endif

    @if($status=='ok_update')
     <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Usuario</strong> actualizado con éxito.
     </div>
    @endif
  </div>



<div class="container">
          <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Usuarios</strong> registrados</h2>
                            </div>
                            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nombres</th>
                                            <th class="text-center">Apellidos</th>
                                            <th>Rol</th>
                                            <th>Email</th>
                                            <th>Contacto</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($users as $users)
                                        <tr>
                                            <td class="text-center">{{$users->name}}</td>
                                            <td class="text-center">{{$users->last_name}}</td>
                                            <td>{{$users->rol_name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>{{$users->phone}}</td>
                                            <td class="text-center">
                                               <a href="editar-usuario/{{$users->id}}" class="btn btn-primary">Editar</a>
                                                <script language="JavaScript">
						                         function confirmar ( mensaje ) {
						                         return confirm( mensaje );}
					                            </script>
                                      @if($users->rol_id == 4)
                                       <a href=""  class="btn btn-danger disabled" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Eliminar</button>
                                      @else
					                           <a href="eliminar-usuario/{{$users->id}}"  class="btn btn-danger" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Eliminar</button>
                                   
                                      @endif
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

