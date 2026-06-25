import {alerta, enviarFetch} from "./general.js";

// Cuando termine de cargar el html ejecutar esto
document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("btnRegistrarUsuario").addEventListener('click',function(){
        registrar();
    })

    document.getElementById("btnMostrarModuloUsuario").addEventListener('click',function(){
        toggleUsuario();
        obtenerUltimoCodigo();
    })
    document.getElementById("btnCerrarModuloUsuario").addEventListener('click',function(){
        toggleUsuario();
    })
    document.getElementById("btnCerrarEmpleado").addEventListener('click',function(){
        toggleEmpleado();
    })
    document.getElementById("btnBuscarEmpleado").addEventListener('click',function(){
        toggleEmpleado();
    })
    document.getElementById("btnEliminado").addEventListener('click',function(){

    })
    document.getElementById("btnActivo").addEventListener('click',function(){

    })

    listarRol();
    listarEmpleado();
})


async function registrar(){
    const btnRegistrarUsuario = document.getElementById("btnRegistrarUsuario");

    // obtener valores
    const txtUsuarioCodigo = document.getElementById("txtUsuarioCodigo").value;
    const txtUsuarioNombre = document.getElementById("txtUsuarioNombre").value;
    const txtUsuarioContrasena = document.getElementById("txtUsuarioContrasena").value;
    const cbxRol = document.getElementById("cbxRol").value;
    const txtEmpleadoCodigo = document.getElementById("txtEmpleadoCodigo").value;

    // array de datos
    const usuario = {
        usuario_codigo : txtUsuarioCodigo,
        usuario_nombre : txtUsuarioNombre,
        usuario_contrasena : txtUsuarioContrasena,
        usuario_rol_codigo : cbxRol,
        usuario_empleado_codigo : txtEmpleadoCodigo
    }

    if(btnRegistrarUsuario.innerText == "Registrar"){
        const respuesta = await enviarFetch("/usuario/registrar",usuario);

        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);
            limpiar();
            toggleUsuario();
            listarUsuario();
        }else{
            alerta(respuesta.mensaje, false);
        }

    }else if(btnRegistrarUsuario.innerText == "Actualizar"){

    }


}
async function actualizar(){

}
async function eliminar(){

}
async function recuperar(){

}
async function listarUsuario(){

}
async function listarUsuarioEliminado(){

}
async function obtenerUltimoCodigo(){
    // enviar peticion
    const respuesta = await enviarFetch("/usuario/ultimoCodigo");
    // obtener input
    const txtUsuarioCodigo = document.getElementById("txtUsuarioCodigo");

    if(respuesta.exito == true){
        // agregar codigo al campo
        txtUsuarioCodigo.value = respuesta.mensaje;
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listarRol(){
    const respuesta = await enviarFetch("/rol/listar");
    // cbx del rol
    const cbxRol = document.getElementById("cbxRol");

    if(respuesta.exito == true){
        const rol = respuesta.mensaje;

        // option default
        const option = document.createElement('option');
        option.text = "Rol";
        cbxRol.appendChild(option);

        for(let i = rol.length -1; i>=0; i--){
            const option = document.createElement('option');
            option.value = rol[i].rol_codigo;
            option.text = rol[i].rol_nombre;

            cbxRol.appendChild(option);
        }
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listarEmpleado(){
    const respuesta = await enviarFetch("/empleado/listar");

    // obtener la tabla
    const tbody = document.querySelector("#tblEmpleado tbody");
    tbody.innerHTML = "";

    if(respuesta.exito ==true){
        const empleado = respuesta.mensaje;

        for(let i=empleado.length -1 ; i>=0; i--){
            const fila = tbody.insertRow();

            fila.insertCell().innerText = empleado[i].empleado_codigo;
            fila.insertCell().innerText = empleado[i].empleado_nombre;

            // boton seleccionar
            const btnSeleccionar = fila.insertCell();
            btnSeleccionar.innerHTML = "<img src='/imagen/iconoSeleccionar.png'>";
            btnSeleccionar.addEventListener('click',function(){seleccionarEmpleado(empleado[i])});
        }
    }else{
        alerta(respuesta.mensaje, false);
    }
}



function seleccionarEmpleado(empleado){
    toggleEmpleado();
    // obtener campos
    const txtEmpleadoCodigo = document.getElementById("txtEmpleadoCodigo");
    const txtEmpleadoNombre = document.getElementById("txtEmpleadoNombre");

    txtEmpleadoCodigo.value = empleado.empleado_codigo;
    txtEmpleadoNombre.value = empleado.empleado_nombre;
}
function limpiar(){
    // obtener valores
    document.getElementById("txtUsuarioCodigo").value = "";
    document.getElementById("txtUsuarioNombre").value = "";
    document.getElementById("txtUsuarioContrasena").value = "";
    document.getElementById("cbxRol").value = "";
    document.getElementById("txtEmpleadoCodigo").value = "";

    document.getElementById("btnRegistrarUsuario").innerText="Registrar";

}



function toggleUsuario(){
    const moduloRegistrar = document.querySelector(".fondoModuloRegistrar");

    moduloRegistrar.classList.toggle("ocultar");
}
function toggleEmpleado(){
    const moduloEmpleado = document.querySelector(".moduloEmpleado");

    moduloEmpleado.classList.toggle("ocultar");
}
function ocultarTabla(tablaUsuario, tablaUsuarioEliminado){

}

