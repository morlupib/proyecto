@extends('layouts.app')

@section('content')
<div class="container">
	<a href="{!! route('propietarios.edit',[$propietario->id]) !!}" class="btn btn-primary pull-right">Actualizar</a>
    @include('propietarios.show_fields')
</div>

@endsection
