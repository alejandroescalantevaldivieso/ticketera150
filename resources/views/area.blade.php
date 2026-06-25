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
    
                <button id="btnRegistrar" class="botonBaseUno py-1 w-100">
                    Registrar
                </button>
                <button id="btnCerrar" class="botonBaseUno py-1 w-100 mt-2">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla -->
    <div class="container mt-4">     
        <div class="contenedorBotones row mt-4">
            <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                <button id="btnVerActivos" class="botonBaseUno py-1 me-2 w-100 ">
                    Activos
                </button>

            </div>
            <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                <button id="btnVerEliminados" class="botonBaseUno py-1 me-2 w-100">
                    Eliminados
                </button>

            </div>
            <div class="col-12 col-md-4 col-lg-2 text-center mb-3">
                <button id="btnMostrarRegistrar" class="botonBaseUno py-1 w-100">
                    Registrar
                </button>

            </div>

        </div>   

        <div class="table-responsive">
            <!-- tabla area -->
            <table id="tblArea" class="tablaBaseUno">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>                                                      
                    </tr>
                </thead>
                <tbody>                                           
                </tbody>
            </table>
            <!-- tabla area eliminados -->
            <div class="tblAreaEliminado ocultar">
                <h1 class="mt-5">Areas eliminadas</h1>
                <table id="tblAreaEliminado" class="tablaBaseUno">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>                                                      
                        </tr>
                    </thead>
                    <tbody>                                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
