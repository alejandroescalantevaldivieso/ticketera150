
let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("btnAlertaCerrar").addEventListener('click',function(){
        ocultarAlerta();
    })
})


export function alerta(mensaje,tipo){
    
    //Obtener la alerta
    let alerta = document.getElementById("alertaPrincipal");

    //Obtener el txt de alerta y agregamos el mensaje
    document.getElementById("txtAlerta").innerText = mensaje;

    //Obtener el fondo de la alerta
    const fondoAlerta = document.querySelector(".alerta-contenido");
    fondoAlerta.classList.remove("fondoAlertaVerde");
    fondoAlerta.classList.remove("fondoAlertaRojo");
    if(tipo == true){        
        fondoAlerta.classList.add("fondoAlertaVerde");
    }else if(tipo == false){
        fondoAlerta.classList.add("fondoAlertaRojo");
    }    
    //mostrar la alerta
    alerta.classList.remove("ocultar");
}

export async function enviarFetch(url,datos){
    try{
        let respuesta = await fetch(url,{
            method:"POST",
            headers:{
                "content-type": "application/json",
                "X-CSRF-TOKEN": token,
                "Accept": "application/json" 
                },
            body: JSON.stringify(datos)
        })

        let mensaje = await respuesta.json();

        if(!respuesta.ok){             
            return {
                exito:"fatal",
                mensaje: mensaje.message                
            };
        }      

        return mensaje;

    }catch(error){       
        console.log(error.message);
        return {
            exito: false,
            mensaje: error.message
        }        
    }
}

function ocultarAlerta(){
    let alerta = document.getElementById("alertaPrincipal");   

    if(alerta.classList.contains("ocultar")){
        alerta.classList.remove("ocultar");
    }else{
        alerta.classList.add("ocultar");
    }
}
