@extends('layaouts.app')

@section('title')
    Empresa
@endsection

@push('styles')
    @vite(['resources/css/empresa.css', 'resources/js/empresa.js'])
@endpush

@section('content')
    
    <!-- ========== Modulo para registrar empresas ==========  -->
    <div class="contenedorModulo ocultar">
        <div class="fondoModulo"></div>
        <div class="modulo">
            <div class="row ">
                <div class="col-12 mb-2">
                    <input id="txtCodigo" class="w-100 inputBaseUno" type="text" placeholder="Codigo" disabled=true>                    
                </div>
                <div class="col-12 mb-2">
                    <input id="txtNombre" class="w-100 inputBaseUno" type="text" placeholder="Nombre">
                </div>
                <div class="col-12 mb-1">
                    <button id="btnRegistrar" class="w-100 botonBaseUno">Registrar</button>
                </div>
                <div class="col-12 mb-1">
                    <button id="btnCerrar" class="w-100 botonBaseUno">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <!-- ========== Contenedor de botones ========== -->
        <div class="contenedorBotones mt-5">
            <div class="row mt-4">
                <div class="col-12 col-md-4 col-lg-2 mb-2">
                    <button id="btnActivos" class="botonBaseUno w-100">Activos</button>
                </div>
                <div class="col-12 col-md-4 col-lg-2 mb-2 ">
                    <button id="btnEliminado" class="botonBaseUno w-100">Eliminados</button>
                </div>
                <div class="col-12 col-md-4 col-lg-2 mb-2 ">
                    <button id="btnMostrarModuloRegistrar" class="botonBaseUno w-100">Registrar</button>
                </div>
            </div>
        </div>

        <!-- ========== Contenedor de tablas ========== -->
        <div class="table-responsive">
            <!-- Tabla empresa -->
            <table id="tblEmpresa" class="tablaBaseUno">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!-- Tabla empresas eliminadas -->
            <div class="tblEmpresaEliminado ocultar">
                <h1 class="mt-4">Empresas eliminadas</h1>
                <table id="tblEmpresaEliminado" class="tablaBaseUno">
                    <thead>
                        <tr>
                            <th>Codigo</th>
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