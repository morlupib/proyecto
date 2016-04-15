@extends('layouts.app')

@section('content')
<style>
body {background-color: #F2F5A9}

</style>
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar Datos</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'propietarios.store']) !!}

            @include('propietarios.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection