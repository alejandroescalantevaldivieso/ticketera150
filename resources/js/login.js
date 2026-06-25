import {alerta, enviarFetch} from "./general.js";

document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("btnIniciar").addEventListener('click',function(){
        validarCredencial();
    })    
})

async function validarCredencial(){
    // obtener campos
    const txtUsuario = document.getElementById("txtUsuario").value;
    const txtContrasena = document.getElementById("txtContrasena").value;

    // array de datos
    const usuario ={
        usuario_nombre: txtUsuario,
        usuario_contrasena: txtContrasena
    }

    const respuesta = await enviarFetch("/usuario/validar",usuario);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje,true);

        const usuario = respuesta.usuario;

        localStorage.setItem("usuario_codigo", usuario.usuario_codigo);
        localStorage.setItem("usuario_nombre", usuario.usuario_nombre);
        localStorage.setItem("rol_nombre", usuario.rol.rol_nombre);

        setTimeout(()=>{
            window.location.href = "/principal";
        }, 1000);
    }else{
        alerta(respuesta.mensaje, false);
    }
}
