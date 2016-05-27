@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="panel panel-primary"> 
            <div class="panel-heading"><h3>Registrar cabaña </h3></div> 
            <div class="panel-body">

            @include('core-templates::common.errors')
                <div class="container">
                    <div class="row">
                        {!! Form::open(['route' => 'cabanas.store', 'enctype'=>"multipart/form-data"]) !!}

                            @include('cabanas.fields')
                        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>    
@endsection

