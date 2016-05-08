<div class="panel panel-primary">
                <div class="panel-heading"><h3>Modificar datos </h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group-ms-6 "> 
                            {!! Form::label('nombre', 'Nombre:') !!} 
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!} 
                        </div> 
                        <div class="form-group-ms-6 "> 
                            {!! Form::label('apellido', 'Apellido:') !!} 
                            {!! Form::text('apellido', null, ['class' => 'form-control']) !!} 
                        </div>  
                        <div class="form-group-sm-6"> 
                            <span class="form-group-addon"> 
                                <span class="glyphicon glyphicon-earphone"></span> 
                            </span> 
                                {!! Form::label('telefono', 'Teléfono:') !!} 
                                {!! Form::number('telefono', null, ['class' => 'form-control']) !!} 
                            <span class="form-group-addon"> 
                                <span class="glyphicon glyphicon-envelope"></span> 
                            </span> 
                             
                            {!! Form::label('email', 'E-mail:') !!} 
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}         
                        </div>
                        <!-- Submit Field -->
                        <div class="form-group col-sm-8"> 
                            <button type="submit" class="btn btn-success"> 
                             <span class="glyphicon glyphicon-ok"></span> Guardar 
                         </button>                     
                          <!-- {!!  Form::submit('Guardar', ['class' => 'btn btn-success']) !!}-->
                          <a href="{{ url('/') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
</div>

                        </div>  
                         </div> 


