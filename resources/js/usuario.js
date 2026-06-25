import {alerta, enviarFetch} from "./general.js";

// Cuando termine de cargar el html ejecutar esto
document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("btnRegistrarUsuario").addEventListener('click',function(){
        registrar();
    })

    document.getElementById("btnMostrarModuloUsuario").addEventListener('click',function(){
        toggleUsuario();
        obtenerUltimoCodigo();
        listarRol();
    })
    document.getElementById("btnCerrarModuloUsuario").addEventListener('click',function(){
        toggleUsuario();
        limpiar();
    })
    document.getElementById("btnCerrarEmpleado").addEventListener('click',function(){
        toggleEmpleado();
    })
    document.getElementById("btnBuscarEmpleado").addEventListener('click',function(){
        toggleEmpleado();
    })
    document.getElementById("btnEliminado").addEventListener('click',function(){
        ocultarTabla(true,false);
    })
    document.getElementById("btnActivo").addEventListener('click',function(){
        ocultarTabla(false,true);
    })    
    listarEmpleado();
    listarUsuario();
    listarUsuarioEliminado();
    ocultarTabla(false,true);
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

    // Registrar
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
        // Actualizar
    }else if(btnRegistrarUsuario.innerText == "Actualizar"){

        const respuesta = await enviarFetch("/usuario/actualizar", usuario);

        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);
            toggleUsuario();
            listarUsuario();
            limpiar();
        }else{
            alerta(respuesta.mensaje, false);
        }

        // Cambiar contraseña
    }else if(btnRegistrarUsuario.innerText == "Cambiar contraseña"){
        const respuesta = await enviarFetch("/usuario/cambiarContrasena",usuario);

        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);
            toggleUsuario();
            limpiar();
            listarUsuario();
        }else{
            alerta(respuesta.mensaje, false);
        }
    }else{
        console.log("no entro");
    }


}
async function actualizar(usuario){
    toggleUsuario();
    await listarRol();


    // cambiar nombre al boton
    document.getElementById("btnRegistrarUsuario").innerText = "Actualizar";
    // desactivar el boton de buscar empleado
    document.getElementById("btnBuscarEmpleado").disabled = true;

    // obtener valores
    document.getElementById("txtUsuarioCodigo").value = usuario.usuario_codigo;
    document.getElementById("txtUsuarioNombre").value = usuario.usuario_nombre;
    document.getElementById("cbxRol").value = usuario.usuario_rol_codigo;    
    document.getElementById("txtEmpleadoCodigo").value = usuario.usuario_empleado_codigo;
    document.getElementById("txtEmpleadoNombre").disabled=true;// desactivar el campo nombre empleado
    document.getElementById("txtUsuarioContrasena").disabled = true;


}
async function eliminar(usuario){
    const respuesta = await enviarFetch("/usuario/eliminar",usuario);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje, true);
        listarUsuario();
        listarUsuarioEliminado();
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function recuperar(usuario){
    const respuesta = await enviarFetch("/usuario/recuperar",usuario);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje, true);
        listarUsuario();
        listarUsuarioEliminado();
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listarUsuario(){
    const respuesta = await enviarFetch("/usuario/listar");

    const tbody = document.querySelector("#tblUsuario tbody");
    tbody.innerHTML = "";

    if(respuesta.exito == true){
        const usuario = respuesta.mensaje;

        for(let i= usuario.length -1; i>=0; i--){
            const fila = tbody.insertRow();

            fila.insertCell().innerText = usuario[i].usuario_codigo;
            fila.insertCell().innerText = usuario[i].usuario_nombre;
            fila.insertCell().innerText = usuario[i].usuario_empleado_codigo;
            fila.insertCell().innerText = usuario[i].usuario_rol_codigo;

            // boton editar
            const btnActualizar = fila.insertCell();
            btnActualizar.innerHTML = "<img src='/imagen/iconoActualizar.png' title='Actualizar'>";
            btnActualizar.addEventListener('click',function(){actualizar(usuario[i])})

            // boton eliminar
            const btnEliminar = fila.insertCell();
            btnEliminar.innerHTML = "<img src='/imagen/iconoEliminar.png' title='Eliminar'>";
            btnEliminar.addEventListener('click',function(){eliminar(usuario[i])})

            // cambiar contraseña
            const btnCambiarContraseña = fila.insertCell();
            btnCambiarContraseña.innerHTML = "<img src='/imagen/iconoCambiarContraseña.png' title='Cambiar contraseña'>";
            btnCambiarContraseña.addEventListener('click',function(){cambiarContraseña(usuario[i])})
        }

    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listarUsuarioEliminado(){
    const respuesta = await enviarFetch("/usuario/listarEliminado");

    const tbody = document.querySelector("#tblUsuarioEliminado tbody");
    tbody.innerHTML = "";

    if(respuesta.exito == true){
        const usuario = respuesta.mensaje;

        for(let i= usuario.length -1; i>=0; i--){
            const fila = tbody.insertRow();

            fila.insertCell().innerText = usuario[i].usuario_codigo;
            fila.insertCell().innerText = usuario[i].usuario_nombre;
            fila.insertCell().innerText = usuario[i].usuario_empleado_codigo;
            fila.insertCell().innerText = usuario[i].usuario_rol_codigo;

            // boton recuperar
            const btnRecuperar = fila.insertCell();
            btnRecuperar.innerHTML = "<img src='/imagen/iconoRecuperar.png' title='Recuperar'>";
            btnRecuperar.addEventListener('click',function(){recuperar(usuario[i])})

        }

    }else{
        console.log(respuesta.mensaje);
    }
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
    cbxRol.innerHTML = "";

    if(respuesta.exito == true){
        const rol = respuesta.mensaje;

        // option default
        const option = document.createElement('option');
        option.text = "Rol";
        option.value = "";
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
function cambiarContraseña(usuario){
    toggleUsuario();

    // cambiar nombre al boton
    document.getElementById("btnRegistrarUsuario").innerText = "Cambiar contraseña";
    // desactivar el boton de buscar empleado
    document.getElementById("btnBuscarEmpleado").disabled = true;

    // obtener valores
    document.getElementById("txtUsuarioCodigo").value = usuario.usuario_codigo;
    document.getElementById("txtUsuarioNombre").disabled=true;
    document.getElementById("cbxRol").disabled = true;
    document.getElementById("txtEmpleadoNombre").disabled=true;// desactivar el campo nombre empleado
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

    document.getElementById("txtEmpleadoNombre").disabled= false;
    document.getElementById("btnBuscarEmpleado").disabled = false;
    document.getElementById("txtUsuarioNombre").disabled=false;
    document.getElementById("cbxRol").disabled = false;
    document.getElementById("txtUsuarioContrasena").disabled = false;
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

    const tblUsuario = document.querySelector(".tblUsuario");
    const tblUsuarioEliminado = document.querySelector(".tblUsuarioEliminado");

    if(tablaUsuario){
        tblUsuario.classList.add("ocultar");
    }else{
        tblUsuario.classList.remove("ocultar");
    }

    if(tablaUsuarioEliminado){
        tblUsuarioEliminado.classList.add("ocultar");
    }else{
        tblUsuarioEliminado.classList.remove("ocultar");
    }
}

