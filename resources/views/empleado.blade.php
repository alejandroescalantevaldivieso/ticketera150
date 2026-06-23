@extends('layaouts.app')

@section('title')
    Empleado
@endsection

@push('styles')
    @vite(['resources/css/empleado.css','resources/js/empleado.js'])
@endpush

@section('content')
    
        <!-- ============ Modulo registrar empleado ============ -->   
<div class="contenedorGeneral ocultar">
    <div class="moduloRegistrarEmpleado">
        <!-- ============Datos empleado ============ -->  
        <div class="row text-center">
            <div class="col-6 mb-2">
                <input id="txtEmpleadoCodigo" class="inputBaseUno w-100" type="text" placeholder="Código" disabled=true>
            </div>
            <div class="col-6 mb-2">
                <input id="txtEmpleadoNombre" class="inputBaseUno w-100" type="text" placeholder="Nombre">
            </div>
            <div class="col-6 mb-2">
                <input id="txtEmpleadoApellidoPaterno" class="inputBaseUno w-100" type="text" placeholder="Apellido paterno">
            </div>
            <div class="col-6 mb-2">
                <input id="txtEmpleadoApellidoMaterno" class="inputBaseUno w-100" type="text" placeholder="Apellido materno">
            </div>
            <div class="col-6 mb-2">
                <input id="txtEmpleadoCorreo" class="inputBaseUno w-100" type="text" placeholder="Correo">
            </div>
        <!-- ============Modulo Area ============ -->   
            <div class="moduloArea ocultar">
                <div class="row">
                    <div class="col-8">
                        <input id="" class="inputBaseUno w-100" type="text" placeholder="Buscar por cualquier campo">
                    </div>
                    <div class="col-4">
                        <button id="btnCerrarModuloArea" class="botonBaseUno w-100">Cerrar</button>
                    </div>
                    <div class="col-12">                        
                            <div class="table-responsive">
                                <table id="tblArea" class="tablaBaseUno mt-3">
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
            </div>
        <!-- ============Datos area ============ -->   
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-4">
                        <input id="txtAreaCodigo" class="inputBaseUno w-100" type="text" placeholder="Código area" disabled=true>
                    </div>
                    <div class="col-4">
                        <input id="txtAreaNombre" class="inputBaseUno w-100" type="text" placeholder="Area" disabled=true>
                    </div>
                    <div class="col-4">
                        <button id="btnMostrarModuloArea" class="botonBaseUno w-100">Buscar</button>
                    </div>
                </div>
            </div>

            <!-- ============Modulo empresa ============ -->   
            <div class="moduloEmpresa ocultar">
                <div class="row">
                    <div class="col-8">
                        <input id="" class="inputBaseUno w-100" type="text" placeholder="Buscar por cualquier campo">
                    </div>
                    <div class="col-4">
                        <button id="btnCerrarModuloEmpresa" class="botonBaseUno w-100">Cerrar</button>
                    </div>
                    <div class="col-12">
                        
                            <div class="table-responsive">
                                <table id="tblEmpresa" class="tablaBaseUno mt-3">
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
            </div>
        <!-- ============Datos empresa ============ -->  
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-4">
                        <input id="txtEmpresaCodigo" class="inputBaseUno w-100" type="text" placeholder="Código empresa" disabled=true>
                    </div>
                    <div class="col-4">
                        <input id="txtEmpresaNombre" class="inputBaseUno w-100" type="text" placeholder="Empresa" disabled=true>
                    </div>
                    <div class="col-4">
                        <button id="btnMostrarModuloEmpresa" class="botonBaseUno w-100">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-4">
                <button id="btnEmpleadoRegistrar" class="botonBaseUno w-100">Registrar</button>
            </div>
            <div class="col-4 mt-4">
                <button id="btnCerrarModuloEmpleado" class="botonBaseUno w-100">Cerrar</button>
            </div>
        </div>
    </div>
</div>    


        <!-- ============ Contenedor de botones ============ -->       
        <div class="contenedorDatos">
            <div class="row  contenedorBoton w-100 mt-5 px-5">
                <div class="col-12 col-md-4 col-lg-2 mb-1">
                    <button class="botonBaseUno w-100">Activos</button>
                </div>
                <div class="col-12 col-md-4 col-lg-2 mb-1">
                    <button class="botonBaseUno w-100">Eliminados</button>
                </div>
                <div class="col-12 col-md-4 col-lg-2 mb-1">
                    <button id="btnMostrarModuloRegistrarEmpleado" class="botonBaseUno w-100">Registrar</button>
                </div>                
            </div>
        <!-- ============ Contenedor de tablas ============ -->
            <div class="row contenedorTabla ">
                <div class="col-12">
                    <div class="table-responsive ">
                        <table id="tblEmpleado" class="tablaBaseUno">
                            <thead>
                                <tr>
                                    <th class="px-5 px-xl-0">Codigo</th>
                                    <th class="px-3 px-xl-0">Nombre</th>
                                    <th class="px-3 px-xl-0">Apellido paterno</th>
                                    <th class="px-3 px-xl-0">Apellido materno</th>
                                    <th class="px-3 px-xl-0">Correo</th>
                                    <th class="px-3 px-xl-0">Codigo Area</th>
                                    <th class="px-3 px-xl-0">Area</th>
                                    <th class="px-3 px-xl-0">Codigo Empresa</th>
                                    <th class="px-3 px-xl-0">Empresa</th>
                                </tr>
                            </thead>
                            <tbody>                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
   
@endsection


