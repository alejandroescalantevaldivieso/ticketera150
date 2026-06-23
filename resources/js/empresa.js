import {alerta, enviarFetch} from "./general.js";

document.addEventListener('DOMContentLoaded',function(){
    
    document.getElementById("btnCerrar").addEventListener('click',function(){
        toggleModuloRegistrar();
        limpiar();
    })
    document.getElementById("btnMostrarModuloRegistrar").addEventListener('click',function(){
        toggleModuloRegistrar();
        ultimoCodigo();
    })    
    document.getElementById("btnRegistrar").addEventListener('click',function(){
        registrar();
    })
    document.getElementById("btnActivos").addEventListener('click',function(){
        ocultarTabla(false,true);
    })
    document.getElementById("btnEliminado").addEventListener('click',function(){
        ocultarTabla(true,false);
    })

    listar();
    listarEliminado();
})

async function registrar(){
    //obtener datos
    const empresa_codigo = document.getElementById("txtCodigo").value;
    const empresa_nombre = document.getElementById("txtNombre").value;
    const empresa ={
        empresa_codigo: empresa_codigo,
        empresa_nombre: empresa_nombre
    }

    let btnRegistrar = document.getElementById("btnRegistrar");

    // Registrar
    if(btnRegistrar.innerText == "Registrar"){
        const respuesta = await enviarFetch("/empresa/registrar",empresa);

        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);
            ultimoCodigo();
            document.getElementById("txtNombre").value = "";
            limpiar();
            toggleModuloRegistrar();
            listar();
        }else{
            alerta(respuesta.mensaje, false);            
        }   

    // Actualizar
    }else if(btnRegistrar.innerText == "Actualizar"){
        const respuesta = await enviarFetch("/empresa/actualizar",empresa);

        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);    
            limpiar();
            toggleModuloRegistrar();      
            listar();  
        }else{
            alerta(respuesta.mensaje, false);
        }
    }    
}
async function actualizar(empresa){
    const btnRegistrar = document.getElementById("btnRegistrar");
    const empresa_codigo = document.getElementById("txtCodigo");
    const empresa_nombre = document.getElementById("txtNombre");
    
    btnRegistrar.innerText = "Actualizar";
    empresa_codigo.value =empresa.empresa_codigo;
    empresa_nombre.value =empresa.empresa_nombre;  
    
    toggleModuloRegistrar();
}
async function eliminar(empresa){
    const respuesta = await enviarFetch("/empresa/eliminar",empresa);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje,true);
        listar();
        listarEliminado();
    }else{
        alerta(respuesta.mensaje,false);
    }
}
async function recuperar(empresa){
    const respuesta = await enviarFetch("/empresa/recuperar",empresa);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje,true);
        listar();
        listarEliminado();
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listar(){
    //Obtener tabla
    const tbody  = document.querySelector("#tblEmpresa tbody");
    // Limpiar tabla
    tbody.innerHTML = "";

    // peticion
    const respuesta = await enviarFetch("/empresa/listar");
    
    if(respuesta.exito == true){
        // Obtener empresas
        const empresas = respuesta.mensaje;

        // Recorremos 
        for(let i = empresas.length - 1 ; i >=0; i--){
            // Creamos fila
            const fila = tbody.insertRow();

            // Insertamos celdas
            fila.insertCell().innerText = empresas[i].empresa_codigo;
            fila.insertCell().innerText = empresas[i].empresa_nombre;

            // Botones
            const btnActualizar = fila.insertCell();
            btnActualizar.innerHTML = "<img src='/imagen/iconoActualizar.png'>";
            btnActualizar.addEventListener('click',function(){actualizar(empresas[i])});

            const btnEliminar = fila.insertCell();
            btnEliminar.innerHTML = "<img src='/imagen/iconoEliminar.png'>";
            btnEliminar.addEventListener('click',function(){eliminar(empresas[i])});
        }        
    }else{                
        alerta(respuesta.mensaje, false);
    }
}
async function listarEliminado(){
    const tbody = document.querySelector("#tblEmpresaEliminado tbody");
    tbody.innerHTML = "";

    const respuesta = await enviarFetch("/empresa/listarEliminado");
    if(respuesta.exito == true){
        const empresas = respuesta.mensaje;

        for(let i = empresas.length - 1; i>=0; i--){
            const fila = tbody.insertRow();

            // Insertar celdas
            fila.insertCell().innerText = empresas[i].empresa_codigo;
            fila.insertCell().innerText = empresas[i].empresa_nombre;

            // Boton
            let btnRecuperar = fila.insertCell();
            btnRecuperar.innerHTML = "<img src='/imagen/iconoRecuperar.png'>";
            btnRecuperar.addEventListener('click',function(){recuperar(empresas[i])});
        }
    }else{
        alerta(respuesta.mensaje,false);
    }
}
async function ultimoCodigo(){
    //Obtener el campo codigo
    let empresa_codigo = document.getElementById("txtCodigo");

    const respuesta = await enviarFetch("/empresa/ultimoCodigo");

    if(respuesta.exito == true){
        empresa_codigo.value = respuesta.mensaje;
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function ocultarTabla(tablaEmpresa, tablaEmpresaEliminado){
    const tblEmpresa = document.getElementById("tblEmpresa");
    const tblEmpresaEliminado = document.querySelector(".tblEmpresaEliminado");
    if(tablaEmpresa){
        tblEmpresa.classList.add("ocultar");
    }else{
        tblEmpresa.classList.remove("ocultar");
    }
    if(tablaEmpresaEliminado){
        tblEmpresaEliminado.classList.add("ocultar");
    }else{
        tblEmpresaEliminado.classList.remove("ocultar");
    }
}
function toggleModuloRegistrar(){
    //Obtener el contenedor del modulo registrar
    const moduloRegistrar = document.querySelector(".contenedorModulo");
    moduloRegistrar.classList.toggle("ocultar");
}
function limpiar(){
    const empresa_codigo = document.getElementById("txtCodigo");
    const empresa_nombre = document.getElementById("txtNombre");
    let btnRegistrar = document.getElementById("btnRegistrar");

    empresa_codigo.value ="";
    empresa_nombre.value ="";
    btnRegistrar.innerText= "Registrar";

}




