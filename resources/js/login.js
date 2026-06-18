document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("btnIniciar").addEventListener('click',function(){
        enviarPrincipal();
    })
})


function enviarPrincipal(){
    window.location.href = "/principal";
}