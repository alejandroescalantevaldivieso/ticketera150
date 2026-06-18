@extends('layaouts.app')

@section('title')
    Area
@endsection

@push('styles')
    @vite(['resources/css/area.css', 'resources/js/area.js'])
@endpush

@section('content')
    <div class="fondoContenedorRegistrar ocultarContenedorRegistrar">
        <div class="container mt-5 contenedorRegistrar">
            <div class="border p-3 ">
                
                <input id="txtCodigo" type="text" class="w-100 mb-3 inputBaseUno" placeholder="Código" disabled>
    
                <input id="txtNombre" type="text" class="w-100 inputBaseUno mb-3" placeholder="Nombre">
    
                <button id="btnRegistrar" class="botonBaseUno w-100">
                    Registrar
                </button>
                <button id="btnCerrar" class="botonBaseUno w-100 mt-2">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla -->
     <div class="container mt-4">

        <div class="d-flex justify-content-end mb-3">
            <button id="btnVerEliminados" class="botonBaseUno me-2">
                Eliminados
            </button>

            <button id="btnMostrarRegistrar" class="botonBaseUno">
                Registrar
            </button>
        </div>

        <table class="table tablaBaseUno">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>                                
            </tbody>
        </table>

    </div>
@endsection
