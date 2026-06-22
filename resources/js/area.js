import {alerta, enviarFetch} from './general.js';

document.addEventListener('DOMContentLoaded',function(){   
    document.getElementById("btnRegistrar").addEventListener('click',function(){
        registrar();
    })    
    document.getElementById("btnCerrar").addEventListener('click',function(){
        ocultarModuloRegistrar();
        moduloRegistrarDefault();
    })
    document.getElementById("btnMostrarRegistrar").addEventListener('click',function(){
        ultimoCodigo();
        ocultarModuloRegistrar();
    })     
    document.getElementById("btnVerActivos").addEventListener('click',function(){
        ocultarTabla(false,true);
    })
    document.getElementById("btnVerEliminados").addEventListener('click',function(){
        ocultarTabla(true,false);
    })

    listar();
    listarEliminado();
})
async function registrar() {
    const nombre = document.getElementById("txtNombre").value;
    const codigo = document.getElementById("txtCodigo").value;

    //Obtener el boton
    let btnRegistrar = document.getElementById("btnRegistrar");

    let Area = {
        area_codigo:codigo,
        area_nombre:nombre
    }
    // Registrar
    if(btnRegistrar.innerText == "Registrar"){
        const respuesta = await enviarFetch("/area/registrar", Area);
        console.log(respuesta);
        if (respuesta.exito == true) {
            alerta(respuesta.mensaje, true);            
            document.getElementById("txtNombre").value = "";
            ultimoCodigo();
            moduloRegistrarDefault();
            ocultarModuloRegistrar();
        } else {        
            alerta(respuesta.mensaje, false)
        }        
        // Actualizar
    }else if(btnRegistrar.innerText == "Actualizar"){
        const respuesta = await enviarFetch("/area/actualizar",Area);
        
        if(respuesta.exito == true){
            alerta(respuesta.mensaje, true);
            moduloRegistrarDefault();
            ocultarModuloRegistrar();
        }else if(respuesta.exito == "fatal"){
            alerta(respuesta.mensaje, false);
        }
    }
    listar();    
}
async function actualizar(Area){
    //Mostramos el modulo registrar
    ocultarModuloRegistrar();   

    //Obtenemos el boton
    let btnRegistrar = document.getElementById("btnRegistrar");
    btnRegistrar.innerText= "Actualizar";

    let txtCodigo = document.getElementById("txtCodigo");
    let txtNombre = document.getElementById("txtNombre");
    
    txtCodigo.value=Area.area_codigo;
    txtNombre.value=Area.area_nombre;
}
async function eliminar(Area){
    //Obtener el codigo del area
    const respuesta = await enviarFetch('/area/eliminar', Area);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje,true);
        listar();
        listarEliminado();
    }else{
        alerta(respuesta.mensaje,false);
    }
}
async function recuperar(Area){
    let respuesta = await enviarFetch('/area/recuperar',Area);

    if(respuesta.exito == true){
        alerta(respuesta.mensaje,true);
        listar();
        listarEliminado();
    }else{
        alerta(respuesta.mensaje, false);
    }
}
async function listar(){
    //Obtener el cuerpo de tbody de la tabla
    let tbody = document.querySelector("#tblArea tbody");        
    //Limpiamos el cuerpo 
    tbody.innerHTML= "";
    
    let respuesta = await enviarFetch("/area/listar");

    if(respuesta.exito == true){        
        
        let Area = respuesta.mensaje;
        
        for(let i= Area.length - 1; i >=0 ; i--){
            let Fila = tbody.insertRow();
        
            Fila.insertCell().innerText = Area[i].area_codigo;
            Fila.insertCell().innerText = Area[i].area_nombre;
        
            let btnEditar = Fila.insertCell();
            btnEditar.innerHTML = "<img src='/imagen/iconoActualizar.png' title='Actualizar'>";
            btnEditar.addEventListener('click',function(){
                actualizar(Area[i]);
            })
        
            let btnEliminar = Fila.insertCell();
            btnEliminar.innerHTML = "<img src='/imagen/iconoEliminar.png' title='Eliminar'>";
            btnEliminar.addEventListener('click',function(){
                eliminar(Area[i]);
            })
        }
        
    }else{
        alerta(respuesta.mensaje,false);      
    }
}
async function listarEliminado(){
    //Obtener el cuerpo de la tabla
    let tbody = document.querySelector("#tblAreaEliminado tbody");
    //limpiamos la tabla
    tbody.innerHTML="";

    //Enviamos la petición y obtenemos la respuesta
    let respuesta = await enviarFetch("/area/listarEliminado");
    if(respuesta.exito == false){
        alerta(respuesta.mensaje, false);
        return;
    }
    //Obtenemos las areas
    let Area = respuesta.mensaje;
    //Recorremos el area para insertar datos a la tabla
    for(let i = Area.length - 1; i >= 0 ; i--){
        //Creamos una fila
        let fila = tbody.insertRow();

        //Insertar celdas a la fila
        fila.insertCell().innerText = Area[i].area_codigo;
        fila.insertCell().innerText = Area[i].area_nombre;

        //Recuperar
        let btnRecuperar = fila.insertCell();
        btnRecuperar.innerHTML = "<img src='/imagen/iconoRecuperar.png' title='Restaurar'>";
        btnRecuperar.addEventListener('click',function(){
            recuperar(Area[i]);
        })
    }
}
async function ultimoCodigo(){
    let txtCodigo = document.getElementById("txtCodigo");

    let respuesta = await enviarFetch("/area/ultimoCodigo");

    if(respuesta.exito == true){
        txtCodigo.value = respuesta.mensaje;
    }else{
        console.log(respuesta);
    }
}
function moduloRegistrarDefault(){
    //Obtenemos el boton
    let btnRegistrar = document.getElementById("btnRegistrar");
    btnRegistrar.innerText= "Registrar";

    let txtCodigo = document.getElementById("txtCodigo");
    let txtNombre = document.getElementById("txtNombre");

    txtCodigo.value="";
    txtNombre.value="";
}
function ocultarTabla(tablaArea, tablaAreaEliminado){
    //Obtener tablas 
    let tblArea = document.getElementById("tblArea");
    let tblAreaEliminado = document.querySelector(".tblAreaEliminado");

    if(tablaArea){
        tblArea.classList.add("ocultar");
    }else{
        tblArea.classList.remove("ocultar");
    }

    if(tablaAreaEliminado){
        tblAreaEliminado.classList.add("ocultar");
    }else{
        tblAreaEliminado.classList.remove("ocultar");
    }
}
function ocultarModuloRegistrar(){
    //Obtener el contenedor del modulo registrar
    var moduloRegistrar = document.querySelector(".fondoContenedorRegistrar");
    if(moduloRegistrar.classList.contains("ocultarContenedorRegistrar")){
        moduloRegistrar.classList.remove("ocultarContenedorRegistrar");
    }else{
        moduloRegistrar.classList.add("ocultarContenedorRegistrar");
    }
}





