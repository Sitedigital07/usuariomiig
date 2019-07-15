@extends ('adminsite.representante')


<!-- Define el titulo de la Página -->    
@section('title')
Gestión de usuarios Libros & Libros
@stop


@section('cabecera')
 @parent
@stop

@section('contenido')

	<div class="container">
          <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Ciudades</strong> registrados</h2>
                            </div>
                            <div class="row">
                            	
                      
							   <div class="col-sm-12 col-lg-12">
                                <a href="/colegios-lista" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Colegios</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>


                          
                            </div>
                        </div>
  </div>

  
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@stop