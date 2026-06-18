document.addEventListener('DOMContentLoaded',function(){
    
    
    document.getElementById("btnRegistrar").addEventListener('click',function(){
        registrar();
    })
    
    document.getElementById("btnCerrar").addEventListener('click',function(){
        ocultarModuloRegistrar();
    })
    document.getElementById("btnMostrarRegistrar").addEventListener('click',function(){
        ocultarModuloRegistrar();
    })
})
let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

function ocultarModuloRegistrar(){
    //Obtener el contenedor del modulo registrar
    var moduloRegistrar = document.querySelector(".fondoContenedorRegistrar");
    if(moduloRegistrar.classList.contains("ocultarContenedorRegistrar")){
        moduloRegistrar.classList.remove("ocultarContenedorRegistrar");
    }else{
        moduloRegistrar.classList.add("ocultarContenedorRegistrar");
    }
}

async function enviarFetch(url,datos){
    try{
        let respuesta = await fetch(url,{
            method:"POST",
            headers:{"content-type": "application/json", "X-CSRF-TOKEN": token},
            body: JSON.stringify(datos)
        })

        let mensaje = await respuesta.json();

        if(mensaje.exito == true){
            return {
                ok: true,
                mensaje: mensaje.mensaje,
                data: mensaje
            };
        }else{
            console.log(mensaje);
            return{
                mensaje:"Error"
            }
        }        

    }catch(error){
        console.log(error.message);
        return {
            ok: false,           
            mensaje: "Error en consola",
            error: error.message
        };
    }

}

async function registrar() {
    const nombre = document.getElementById("txtNombre").value;

    const respuesta = await enviarFetch("/area/registrar", {
        area_nombre: nombre,
        area_codigo:""
    });

    if (respuesta.ok == true) {
        console.log(respuesta.mensaje);
        document.getElementById("txtNombre").value = "";
    } else {
        console.log(respuesta.mensaje);
        alert(respuesta.mensaje)
    }
}


