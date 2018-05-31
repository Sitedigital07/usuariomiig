@extends ('adminsite.presentacion')
<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent
   <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
@stop

@section('contenido')



  <div class="container">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Editar</strong> usuario</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/update-usuario',$usuarios->id))) }}
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombres</label>
                                            <div class="col-md-9">
                                               {{Form::text('name', $usuarios->name, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Apellidos</label>
                                            <div class="col-md-9">
                                                {{Form::text('last_name', $usuarios->last_name, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                            <div class="col-md-9">
                                               {{Form::text('email', $usuarios->email, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Dirección de residencia</label>
                                            <div class="col-md-9">
                                                 {{Form::text('address', $usuarios->address, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Telefono fijo o celular</label>
                                            <div class="col-md-9">
                                                {{Form::text('phone', $usuarios->phone, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Rol de usuario</label>
                                            <div class="col-md-9">
                                                <select id="example-select" name="level" class="form-control">
                                                    <option value="" disabled selected>Seleccione rol</option>
                                                     @foreach($rols as $rols)
                                                      <option value="{{$rols->rol_id}}" selected>{{$rols->rol_name}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Región</label>
                                            <div class="col-md-9">
                                                <select id="region" name="region" class="form-control">

                                                     @foreach($usuariosregion as $usuariosregion)
                                                    <option value="{{$usuariosregion->regionid}}" selected>{{$usuariosregion->region}}</option>
                                                     @endforeach
                                                    
                                               @foreach($regiones as $regiones)
                                                      <option value="{{$regiones->id}}">{{$regiones->region}}</option>
                                               @endforeach
                                           </select>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Agencia</label>
                                            <div class="col-md-9">
                                              <select class="form-control selector" name="agencia" id="agencia">
                                                <option value="0" selected>Seleccione agencia</option>
                                             <option value="1"></option>
                                            </select> 
                                            </div>
                                        </div>


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



<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
     
             name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo dirigido es requerido'
                    },
                    stringLength: {
                        min: 2,
                        max: 150,
                        message: 'El campo nombre debe contener un minimo de 2 y un maximo de 150 Caracteres'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
   last_name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo dirigido es requerido'
                    },
                    stringLength: {
                        min: 2,
                        max: 150,
                        message: 'El campo apellido debe contener un minimo de 2 y un maximo de 150 Caracteres'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
email: {
                validators: {
                   notEmpty: {
                        message: 'El campo email es requerido'
                    },
                    emailAddress: {
                        message: 'El email ingresado no es valido'
                    }
                }
            },


      password: {
                validators: {
                    notEmpty: {
                        message: 'El campo contraseña es requerido'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'La contraseña y su confirmación no son los mismos'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'El campo confirmar contraseña es requerido'
                    },
                    identical: {
                        field: 'password',
                        message: 'La contraseña y su confirmación no son los mismos'
                    }
                }
            },   

                level: {
                validators: {
                    notEmpty: {
                        message: 'El campo rol es requerido'
                    },
                   
                }
            },   
    
        }
    });
  $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });

});

</script>

 <script type="text/javascript">
     
      $('#region').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/usuario/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#agencia').empty();
            $.each(data, function(index, subcatObj){
              $('#agencia').append('<option value="'+subcatObj.ids+'">'+subcatObj.n_ciudad+'</option>');
            });
        });
      });
   </script>   

@stop