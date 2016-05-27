@extends('layouts.app')

@section('content')
    <div class="container">

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($propietario, ['route' => ['propietarios.update', $propietario->id], 'method' => 'patch']) !!}

            @include('propietarios.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection