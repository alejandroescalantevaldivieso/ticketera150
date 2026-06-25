@extends('layaouts.app')

@section('title')
    Usuario
@endsection

@push('styles')
    @vite(['resources/css/usuario.css','resources/js/usuario.js'])
@endpush

@section('content')

<div class="fondoModuloRegistrar ocultar">
    <div class="moduloRegistrarUsuario">
        <div class="row">          

<!-- ============ datos usuario ============ -->
            <p class="texto">Datos del usuario</p>
            <div class="col-12 contenedorDatoUsuario mb-4">
                <div class="row">
                    <div class="col-4 mb-2">
                        <input id="txtUsuarioCodigo" type="text" class="inputBaseUno w-100" placeholder="Código" disabled=true>
                    </div>
                    <div class="col-8 mb-2">
                        <input id="txtUsuarioNombre" type="text" class="inputBaseUno w-100" placeholder="Nombre">
                    </div>
                    <div class="col-6 mb-2">
                        <input id="txtUsuarioContrasena" type="text" class="inputBaseUno w-100" placeholder="Contraseña">
                    </div>
                    <div class="col-6">
                        <select id="cbxRol" class="inputBaseUno w-100 py-1">                    
                        </select>
                    </div>
                </div>
            </div>            

<!-- ============ modulo empleado ============ -->
            <div class="moduloEmpleado ocultar">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="inputBaseUno w-100" placeholder="Busca por cualquier campo">
                    </div>
                    <div class="col-4">
                        <button id="btnCerrarEmpleado" class="botonBaseUno w-100 py-1">Cerrar</button>
                    </div>
                </div>
<!-- ============ tabla empleado ============ -->
                <div class="row contenedorTablaEmpleado">                    
                        <div class="table-responsive">
                            <table id="tblEmpleado" class="tablaBaseUno mt-3">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>                                       
                                    </tbody>
                                </tbody>
                            </table>
                        </div>                    
                </div>
            </div>
<!-- ============ datos empleado ============ -->
            <p class="texto">Datos del empleado</p>
            <div class="col-12 mb-3 contenedorDatoEmpleado mb-5">                
                <div class="row">
                    <div class="col-3">
                        <input id="txtEmpleadoCodigo" type="text" placeholder="Código" class="inputBaseUno w-100" disabled=true>
                    </div>
                    <div class="col-5">
                        <input id="txtEmpleadoNombre" type="text" placeholder="Nombre" class="inputBaseUno w-100">
                    </div>
                    <div class="col-4">
                        <button id="btnBuscarEmpleado" class="botonBaseUno w-100">Buscar</button>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        <button id="btnRegistrarUsuario" class="botonBaseUno w-100 py-1">Registrar</button>
                    </div>
                    <div class="col-4">
                        <button id="btnCerrarModuloUsuario" class="botonBaseUno w-100 py-1">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>












<!-- ================== Contenedor general ================== -->
<div class="contenedorGeneral">
    <div class="row contenedorBoton">
        <div class="col-12 col-lg-2 mb-2">
            <button id="btnActivo" class="botonBaseUno w-100 py-1">Activos</button>
        </div>
        <div class="col-12 col-lg-2 mb-2">
            <button id="btnEliminado" class="botonBaseUno w-100 py-1">Eliminados</button>
        </div>
        <div class="col-12 col-lg-2 mb-2">
            <button id="btnMostrarModuloUsuario" class="botonBaseUno w-100 py-1">Registrar</button>
        </div>
    </div>
<!-- ================== Contenedor de tablas ================== -->
    <div class="row contenedorTabla">
        <div class="table-responsive">
            <table class="tablaBaseUno">
                <thead>
                    <tr>
                        <th class="px-5">Código</th>
                        <th class="px-5">Nombre</th>
                        <th class="px-5">Codigo Empleado</th>
                        <th class="px-5">Codigo Rol</th>
                    </tr>
                </thead>
                <tbody>                            
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection