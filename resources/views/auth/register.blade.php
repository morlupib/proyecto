@extends('layouts.app')

@section('content')

<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Registrarse </h3></div>
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
                        <div class="form-group-sm-6{{ $errors->has('telefono') ? ' has-error' : '' }}"> 
                            <span class="form-group-addon"> 
                                <span class="glyphicon glyphicon-earphone"></span> 
                            </span> 
                                {!! Form::label('telefono', 'Teléfono:') !!} 
                                {!! Form::number('telefono', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>  
                        <div class="form-group-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">  
                            <span class="form-group-addon"> 
                                <span class="glyphicon glyphicon-envelope"></span> 
                            </span> 
                                {!! Form::label('email', 'E-mail:') !!} 
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif       
                        </div>

                        <div class="form-group-sm-8"> 
                            <div class="panel panel-info"> 
                            <div class="panel-heading"> <span class="glyphicon glyphicon-user"></span> Usuario</div> 

                        <div class="panel-body"> 


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><span class="glyphicon glyphicon-lock"></span> Contraseña</label> 

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</div>
</div>
</div>

                        <div class="form-group">
                            <div class="col-md-offset-4"> 
                                <button type="submit" class="btn btn-success"> 
                                   <span class="glyphicon glyphicon-ok"></span> Guardar 
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
