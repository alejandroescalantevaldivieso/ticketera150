import { alerta, enviarFetch } from './general.js';

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("btnEmpleadoRegistrar").addEventListener('click',function(){
        registrar();
    })







    document.getElementById("btnCerrarModuloEmpresa").addEventListener('click', function () {
        toggleEmpresa();
    })
    document.getElementById("btnCerrarModuloArea").addEventListener('click', function () {
        toggleArea();
    })
    document.getElementById("btnCerrarModuloEmpleado").addEventListener('click', function () {
        toggleEmpleado();
    })
    document.getElementById("btnMostrarModuloRegistrarEmpleado").addEventListener('click', function () {
        toggleEmpleado();
    })
    document.getElementById("btnMostrarModuloArea").addEventListener('click', function () {
        toggleArea();
    })
    document.getElementById("btnMostrarModuloEmpresa").addEventListener('click', function () {
        toggleEmpresa();
    })

    listar();
    listarArea();
    listarEmpresa();
})
async function registrar() {
    // Obtener boton
    const btnEmpleadoRegistrar = document.getElementById("btnEmpleadoRegistrar");

    // Obtener datos
    const txtEmpleadoCodigo = document.getElementById("txtEmpleadoCodigo").value;
    const txtEmpleadoNombre = document.getElementById("txtEmpleadoNombre").value;
    const txtEmpleadoApellidoPaterno = document.getElementById("txtEmpleadoApellidoPaterno").value;
    const txtEmpleadoApellidoMaterno = document.getElementById("txtEmpleadoApellidoMaterno").value;
    const txtEmpleadoCorreo = document.getElementById("txtEmpleadoCorreo").value;
    const txtAreaCodigo = document.getElementById("txtAreaCodigo").value;
    const txtAreaNombre = document.getElementById("txtAreaNombre").value;
    const txtEmpresaCodigo = document.getElementById("txtEmpresaCodigo").value;
    const txtEmpresaNombre = document.getElementById("txtEmpresaNombre").value;

    // Array de datos
    const Empleado = {
        empleado_codigo: txtEmpleadoCodigo,
        empleado_nombre: txtEmpleadoNombre,
        empleado_apellido_paterno: txtEmpleadoApellidoPaterno,
        empleado_apellido_materno: txtEmpleadoApellidoMaterno,
        empleado_correo: txtEmpleadoCorreo,
        empleado_area_codigo: txtAreaCodigo,
        empleado_empresa_codigo: txtEmpresaCodigo
    }

    // Registrar
    if (btnEmpleadoRegistrar.innerText == "Registrar") {
        // Enviar peticion
        const respuesta = await enviarFetch("/empleado/registrar", Empleado);

        if (respuesta.exito == true) {
            alerta(respuesta.mensaje, true);
            limpiar();
            toggleEmpleado();
            listar();
        } else {
            alerta(respuesta.mensaje,false);
        }

        // Actualizar
    } else if (btnEmpleadoRegistrar.innerText == "Actualizar") {

    }
}
async function actualizar() {

}
async function eliminar() {

}
async function recuperar() {

}
async function listar() {
    // Enviar peticion
    const respuesta = await enviarFetch("/empleado/listar");

    // Obtener tabla
    const tbody = document.querySelector("#tblEmpleado tbody");
    // Limpiar tabla
    tbody.innerHTML = "";

    if(respuesta.exito == true){
         // Obtener empleados
        const Empleados = respuesta.mensaje;
        // Recorrer 
        for(let i = Empleados.length - 1; i>=0; i--){
            // Insert fila
            const fila = tbody.insertRow();

            // Insertar celdas
            fila.insertCell().innerText = Empleados[i].empleado_codigo;
            fila.insertCell().innerText = Empleados[i].empleado_nombre;
            fila.insertCell().innerText = Empleados[i].empleado_apellido_paterno;
            fila.insertCell().innerText = Empleados[i].empleado_apellido_materno;
            fila.insertCell().innerText = Empleados[i].empleado_correo;
            fila.insertCell().innerText = Empleados[i].empleado_area_codigo;
            fila.insertCell().innerText = Empleados[i].area.area_nombre;
            fila.insertCell().innerText = Empleados[i].empresa.empresa_codigo;
            fila.insertCell().innerText = Empleados[i].empresa.empresa_nombre;
            
            // Boton actualizar
            const btnActualizar = fila.insertCell();
            btnActualizar.innerHTML = "<img src='/imagen/iconoActualizar.png'>";
            btnActualizar.addEventListener('click',function(){actualizar(Empleados[i])})

            // Boton Eliminar
            const btnEliminar = fila.insertCell();
            btnEliminar.innerHTML = "<img src='/imagen/iconoEliminar.png'>";
            btnEliminar.addEventListener('click',function(){eliminar(Empleados[i])});
        }
    }else{

    }
}
async function listarEliminado() {

}
async function ultimoCodigo() {
    // Obtener campo 
    const txtEmpleadoCodigo = document.getElementById("txtEmpleadoCodigo");

    // Enviar peticion
    const respuesta = await enviarFetch("/empleado/ultimoCodigo");

    if (respuesta.exito == true) {
        txtEmpleadoCodigo.value = respuesta.mensaje;
    } else {
        alerta(respuesta.mensaje, false);
    }
}
async function toggleTabla(tablaEmpleado, tablaEmpleadoEliminado) {

}
function limpiar() {
    // Obtener boton
    document.getElementById("btnEmpleadoRegistrar").innerText="Registrar";

    // Obtener datos
    document.getElementById("txtEmpleadoCodigo").value ="";
    document.getElementById("txtEmpleadoNombre").value ="";
    document.getElementById("txtEmpleadoApellidoPaterno").value ="";
    document.getElementById("txtEmpleadoApellidoMaterno").value ="";
    document.getElementById("txtEmpleadoCorreo").value ="";
    document.getElementById("txtAreaCodigo").value ="";
    document.getElementById("txtAreaNombre").value ="";
    document.getElementById("txtEmpresaCodigo").value ="";
    document.getElementById("txtEmpresaNombre").value ="";
}


async function listarArea() {
    //Obtener el cuerpo de tbody de la tabla
    let tbody = document.querySelector("#tblArea tbody");
    //Limpiamos el cuerpo 
    tbody.innerHTML = "";

    let respuesta = await enviarFetch("/area/listar");

    if (respuesta.exito == true) {

        let Area = respuesta.mensaje;

        for (let i = Area.length - 1; i >= 0; i--) {
            let Fila = tbody.insertRow();

            Fila.insertCell().innerText = Area[i].area_codigo;
            Fila.insertCell().innerText = Area[i].area_nombre;

            let btnSeleccionar = Fila.insertCell();
            btnSeleccionar.innerHTML = "<img src='/imagen/iconoSeleccionar.png' title='Actualizar'>";
            btnSeleccionar.addEventListener('click', function () {
                seleccionarArea(Area[i]);
            })
        }
    } else {
        alerta(respuesta.mensaje, false);
    }
}
function seleccionarArea(Area) {
    toggleArea();
    // Obtener campos 
    const txtCodigoArea = document.getElementById("txtAreaCodigo");
    const txtNombreArea = document.getElementById("txtAreaNombre");

    // Mostrar datos en los input
    txtCodigoArea.value = Area.area_codigo;
    txtNombreArea.value = Area.area_nombre;
}
async function listarEmpresa() {
    //Obtener tabla
    const tbody = document.querySelector("#tblEmpresa tbody");
    // Limpiar tabla
    tbody.innerHTML = "";

    // peticion
    const respuesta = await enviarFetch("/empresa/listar");

    if (respuesta.exito == true) {
        // Obtener empresas
        const empresas = respuesta.mensaje;

        // Recorremos 
        for (let i = empresas.length - 1; i >= 0; i--) {
            // Creamos fila
            const fila = tbody.insertRow();

            // Insertamos celdas
            fila.insertCell().innerText = empresas[i].empresa_codigo;
            fila.insertCell().innerText = empresas[i].empresa_nombre;

            // Botones
            const btnSeleccionar = fila.insertCell();
            btnSeleccionar.innerHTML = "<img src='/imagen/iconoSeleccionar.png'>";
            btnSeleccionar.addEventListener('click', function () { seleccionarEmpresa(empresas[i]) });
        }

    } else {
        alerta(respuesta.mensaje, false);
    }
}
function seleccionarEmpresa(Empresa) {
    toggleEmpresa();
    // Obtener campos
    const txtEmpresaCodigo = document.getElementById("txtEmpresaCodigo");
    const txtEmpresaNombre = document.getElementById("txtEmpresaNombre");

    // Mostrar datos en los campos
    txtEmpresaCodigo.value = Empresa.empresa_codigo;
    txtEmpresaNombre.value = Empresa.empresa_nombre;
}



function toggleEmpresa() {
    // Obtener modulo
    const btnCerrar = document.querySelector(".moduloEmpresa");
    btnCerrar.classList.toggle("ocultar");
}
function toggleArea() {
    // Obtener modulo
    const btnCerrar = document.querySelector(".moduloArea");
    btnCerrar.classList.toggle("ocultar");
}
function toggleEmpleado() {
    ultimoCodigo();
    // Obtener modulo
    const btnCerrar = document.querySelector(".contenedorGeneral");
    btnCerrar.classList.toggle("ocultar");
}