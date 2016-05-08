<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $propietario->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $propietario->apellido !!}</p>
</div>

<!-- Mail Field -->
<div class="form-group">
    {!! Form::label('mail', 'Mail:') !!}
    <p>{!! $propietario->email !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $propietario->telefono !!}</p>
</div>
