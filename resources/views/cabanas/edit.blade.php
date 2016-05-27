@extends('layouts.app')

@section('content')
<div class="container"> 
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar cabaña</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cabanas, ['route' => ['cabanas.update', $cabanas->id], 'method' => 'patch']) !!}

            @include('cabanas.fields')

            {!! Form::close() !!}
        </div>
</div>
@endsection