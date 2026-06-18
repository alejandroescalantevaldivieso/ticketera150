<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Área</title>

    @vite(['resources/css/area.css', 'resources/js/area.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<div class="container">

    <h1>Gestión de Área</h1>

    <!-- FORMULARIO -->
    <div class="card">
        <h3>Registrar Área</h3>

        <input type="text" id="nombre" placeholder="Nombre del área">

        <button id="btnRegistrar">Registrar</button>
    </div>

    <!-- LISTADO -->
    <div class="card">
        <h3>Listado de Áreas</h3>

        <button id="btnListar">Actualizar Lista</button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaAreas"></tbody>
        </table>
    </div>

    <!-- ELIMINADOS (opcional si lo usas) -->
    <div class="card">
        <h3>Áreas Eliminadas</h3>

        <button id="btnListarEliminados">Ver Eliminados</button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaAreasEliminadas"></tbody>
        </table>
    </div>

</div>

</body>
</html>