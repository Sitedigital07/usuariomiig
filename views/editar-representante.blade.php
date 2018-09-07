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


@foreach($representantes as $representantes)
@endforeach

@foreach($represen as $represen)
@endforeach



    <div class="container">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Editar</strong> representantes</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('updaterepresentante',$represen->id))) }}
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombres</label>
                                            <div class="col-md-9">
                                                {{Form::text('nombre', $representantes->nombre, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Apellidos</label>
                                            <div class="col-md-9">
                                                {{Form::text('apellido', $representantes->apellido, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Identificacion</label>
                                            <div class="col-md-9">
                                                {{Form::text('identificacion', $representantes->identificacion, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                            <div class="col-md-9">
                                                {{Form::text('email', $representantes->email, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Telefono</label>
                                            <div class="col-md-9">
                                                {{Form::text('telefono', $representantes->telefono, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Región</label>
                                            <div class="col-md-9">
                                                <select name="category" id="category" class="form-control">

                                                    <option value="{{$representantes->region_id}}">{{$representantes->region}}</option>
                                                     @foreach($categories as $category)
                                                      <option value="{{$category->id}}">{{$category->region}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Agencia</label>
                                            <div class="col-md-9">
                                                <select name="subcategory" id="subcategory" class="form-control">
                                                    <option value="{{$representantes->agencia}}">{{$representantes->n_ciudad}}</option>
                                                    
                                                     <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                     
                                        
                                       <br>
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
     
            nombre: {
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

            apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo apellido es requerido'
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

            identificacion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo identificacion es requerido'
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

                  subcategory: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo identificacion es requerido'
                    },
                   
                }
            },


 email: {
                validators: {
                    notEmpty: {
                        message: 'El campo email es requerido'
                    },
                    emailAddress: {
                        message: 'El email ingresado no es valido'
                    },
                  
                }
            },

             category: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo dirigido es requerido'
                    }
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
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.ids+'">'+subcatObj.n_ciudad+'</option>');
            });
        });
      });
   </script>   



@stop