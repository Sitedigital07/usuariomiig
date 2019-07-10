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
                                        <h2><strong>Editar</strong> consumo esseg</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    @foreach($esseg as $esseg)
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/editaressegcol',$esseg->id))) }}
                           
                                   
                                      <div class="form-group">
                                       <label class="col-md-3 control-label" for="example-text-input">Código DANE:</label>
                                       <div class="col-md-9">
                                       <input type="text" name="miig" class="form-control" id="" value="{{$esseg->miig}}" placeholder="Ingrese descuento">
                                       </div>
                                      </div>

                                      <div class="form-group">
                                       <label class="col-md-3 control-label" for="example-text-input">Valor Consumido</label>
                                       <div class="col-md-9">
                                       <input type="text" name="valor" class="form-control" id="" value="{{$esseg->valor}}" placeholder="Ingrese descuento" >
                                       </div>
                                      </div>
                                    
                                       <input type="hidden" name="identificador" class="form-control" id="" value="{{$esseg->identificador}}" placeholder="Ingrese descuento" >

                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     
                                      

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar descuento</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                   {{ Form::close() }}
                                    <!-- END Basic Form Elements Content -->
                                    @endforeach
                                </div>
                              </div>


  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <script type="text/javascript">
     
      $('#regional').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memar/ajax-subcater?cat_id=' + cat_id, function(data){
            $('#asistente').empty();
            $.each(data, function(index, subcatObj){
              $('#asistente').append('<option value="'+subcatObj.id+'">'+subcatObj.name' '+subcatObj.last_name+'</option>');
            });
        });
      });
   </script>  

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
     
             ciudad: {
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

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@stop