
@extends ('adminsite.presentacion')

<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent
    <link rel="stylesheet" href="validaciones/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="validaciones/dist/js/bootstrapValidator.js"></script>
@stop

@section('contenido')



@foreach($representantes as $representantes)
@endforeach


    <div class="container">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> representantes</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crearusuario'))) }}
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombres</label>
                                            <div class="col-md-9">
                                                {{Form::text('name', $representantes->nombre, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Apellidos</label>
                                            <div class="col-md-9">
                                                {{Form::text('last_name', $representantes->apellido, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                            <div class="col-md-9">
                                                {{Form::text('email', $representantes->email, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Teléfono</label>
                                            <div class="col-md-9">
                                                {{Form::text('phone', $representantes->telefono, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        {{Form::hidden('level', '6', array('class' => 'form-control','placeholder'=>''))}}
                                        {{Form::hidden('identidad', $representantes->id, array('class' => 'form-control','placeholder'=>''))}}
                                        {{Form::hidden('password', $representantes->identificacion, array('class' => 'form-control','placeholder'=>''))}}

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <br><br>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                   {{ Form::close() }}
                                    <!-- END Basic Form Elements Content -->
                                </div>
                              </div>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
@stop