@extends('layouts.app')

@section('content')
    
    <div class="container">

        <h3 class="pull-left">Mis Cabañas</h3>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cabanas.create') !!}">Nueva</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
       
        @if($cabanas->isEmpty())
            <div class="well text-center">No existen cabañas.</div>
        @else
            @include('cabanas.table')
        @endif 
    </div>
      
@endsection
