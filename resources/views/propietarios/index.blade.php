@extends('layouts.app')

@section('content')
<style>
body {background-color: #F2F5A9}

</style>

    <div class="container">

        <h1 class="pull-left">Propietario</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('propietarios.create') !!}">Nuevo</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

         @if($propietarios->isEmpty())
            <div class="well text-center">No existen propietarios.</div>
        @else
            @include('propietarios.table')
        @endif
        
    </div>
@endsection