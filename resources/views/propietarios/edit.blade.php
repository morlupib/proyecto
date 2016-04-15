@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit propietario</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($propietario, ['route' => ['propietarios.update', $propietario->id], 'method' => 'patch']) !!}

            @include('propietarios.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection