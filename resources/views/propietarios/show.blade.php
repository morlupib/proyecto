@extends('layouts.app')

@section('content')
<style>
body {background-color: #F2F5A9}

</style>
<div class="container">
	<a href="{!! route('propietarios.edit',[$propietario->id]) !!}" class="btn btn-primary pull-right">Actualizar</a>
    @include('propietarios.show_fields')
</div>

@endsection
