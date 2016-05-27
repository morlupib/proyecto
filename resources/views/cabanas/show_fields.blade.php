<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $cabanas->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $cabanas->descripcion !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $cabanas->direccion !!}</p>
</div>

<!-- Precio Field -->
<div class="form-group">
    {!! Form::label('precio $', 'Precio:') !!}
    <p>{!! $cabanas->precio !!}</p>
</div>

<!-- Imagenes -->
<div class="form-group">
    {!! Form::label('imagenes', 'Imagenes:') !!}
    @foreach($cabanas->imagen as $imagen)
        <img src="{{ asset('imagenes/'.$imagen->nombre) }}" width="178" height="180">
    @endforeach
</div>


