document.addEventListener('DOMContentLoaded',function(){

    //Obtener boton hamburguesa
    document.getElementById("btnHamburguesa").addEventListener('click',function(){
        ocultarMenu();
    })

    document.getElementById("btnEnviarLogin").addEventListener('click',function(){
        enviarLogin();
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
    window.location.href="/principal";
}