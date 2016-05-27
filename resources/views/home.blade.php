@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            @foreach ($cabanas as $cabana)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $cabana->nombre }}</div>

                    <div class="panel-body">
                        <div class="col-sm-4">
                            @foreach ($cabana->imagen as $imagen)
                                <img src="{{ asset('imagenes/'.$imagen->nombre) }}" width="180" height="180" class="img-responsive">
                                @break                             
                            @endforeach
                        </div>
                        <div class="col-sm-8">Descripcion: {{ $cabana->descripcion }}</div>
                        <div class="col-sm-8">Direccion: {{ $cabana->direccion }}</div>
                        <div class="col-sm-8">Precio: $ {{ $cabana->precio }}</div>    
                    </div>
                </div>
            @endforeach
            {{ $cabanas->render() }}
        </div>
    </div>
</div>
@endsection
