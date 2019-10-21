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
                                    <a href="/carga-descuento"><i class="gi gi-charts"></i> Descuentos</a>
                                </li>
                                     <li class="active">
                                    <a href="/descuentos-asignados"><i class="gi gi-charts"></i> Descuentos Asignados</a>
                                </li>
                            
                             
                            </ul>
                        </div>



            @foreach($descuentos as $descuentos)

<div class="container">


  <div class="row">
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
       <strong>Descuento</strong> actualizado con éxito.
     </div>
    @endif
  </div>
  </div>
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Descuentos</strong> Asignados</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                    
                                       
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/editar-descuentos',$descuentos->id))) }}

                                     
                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descuento Gerente Nacional</label>
                                            <div class="col-md-9">
                                              <input type="text" name="nacional" id="input" class="form-control" value="{{$descuentos->descuento_nacional}}" required="required" title="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descuento Gerente Regional </label>
                                            <div class="col-md-9">
                                              <input type="text" name="regional" id="input" class="form-control" value="{{$descuentos->descuento_regional}}" required="required" title="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descuento Representante</label>
                                            <div class="col-md-9">
                                              <input type="text" name="representante" id="input" class="form-control" value="{{$descuentos->descuento_representante}}" required="required" title="">
                                            </div>
                                        </div>
                                      

                      

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Actualizar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                    @endforeach
                                                     
</div>



  
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@stop
       

