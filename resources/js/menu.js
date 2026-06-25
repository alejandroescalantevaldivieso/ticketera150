document.addEventListener('DOMContentLoaded',function(){

    opcionRol();

    //Obtener boton hamburguesa
    document.getElementById("btnHamburguesa").addEventListener('click',function(){
        ocultarMenu();
    })

    document.getElementById("btnSalir").addEventListener('click',function(){
        enviarLogin();
    })
    document.getElementById("btnEnviarPrincipal").addEventListener('click',function(){
        enviarPrincipal();
    })

    const botones = document.querySelectorAll('.botonBaseUno');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            botones.forEach(b => b.classList.remove('botonActivo'));
            boton.classList.add('botonActivo');
        });
    });


})

function ocultarMenu(){
    
    //Obtener menu
    var menu = document.querySelector(".fondoMenu");

    if(menu.classList.contains("ocultarMenu")){
        menu.classList.remove("ocultarMenu");
    }else{
        menu.classList.add("ocultarMenu");
    }   
}

function enviarLogin(){
    window.location.href="/";
}
function enviarPrincipal(){
    window.location.href="/principal";
}

function opcionRol(){
    const rolNombre = localStorage.getItem("rol_nombre");

    if(rolNombre == "Administrador"){
        ocultarOpciones(false,false,false,false);
    }else if(rolNombre == "Usuario"){
        ocultarOpciones(true,true,true,true);
    }
}


function ocultarOpciones(crearUsuario,empleado,area,empresa){
    const btnCrearUsuario = document.getElementById("btnCrearUsuario");
    const btnEmpleado = document.getElementById("btnEmpleado");
    const btnArea = document.getElementById("btnArea");
    const btnEmpresa = document.getElementById("btnEmpresa");

    if(crearUsuario){
        btnCrearUsuario.classList.add("ocultar");
    }else{
        btnCrearUsuario.classList.remove("ocultar");
    }


    if(empleado){
        btnEmpleado.classList.add("ocultar");
    }else{
        btnEmpleado.classList.remove("ocultar");        
    }


    if(area){
        btnArea.classList.add("ocultar");
    }else{
        btnArea.classList.remove("ocultar");        
    }


    if(empresa){
        btnEmpresa.classList.add("ocultar");
    }else{
        btnEmpresa.classList.remove("ocultar");        
    }


}