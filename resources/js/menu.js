document.addEventListener('DOMContentLoaded',function(){

    //Obtener boton hamburguesa
    document.getElementById("btnHamburguesa").addEventListener('click',function(){
        ocultarMenu();
    })

    document.getElementById("btnEnviarLogin").addEventListener('click',function(){
        enviarLogin();
    })


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