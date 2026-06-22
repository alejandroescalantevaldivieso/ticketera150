@extends('layaouts.app')

@section('title')
    Principal
@endsection

@push('styles')
    @vite(['resources/css/principal.css'])
@endpush

@section('content')
    <div class="contenedor">
        <img src="/imagen/fondo150.jpeg">
    </div>


@endsection