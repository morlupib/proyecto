@extends('layouts.app')

@section('content')
    @include('cabanas.show_fields')

    <div class="form-group">
           <a href="{!! route('cabanas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
