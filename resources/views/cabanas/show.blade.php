@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{!! route('cabanas.edit',[$cabanas->id]) !!}" class="btn btn-primary pull-right">Actualizar</a>
    @include('cabanas.show_fields')
</div>
@endsection
