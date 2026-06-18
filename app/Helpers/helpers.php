<?php

function generarCodigo($prefijo,$modelo,$campo){
    //Obtener ultimo registro
    $ultimoRegistro = $modelo::orderByDesc($campo)->first();

    if($ultimoRegistro){
        //Obtener el codigo (ej: ARE0007)
        $codigo = $ultimoRegistro->$campo;
        //Eliminar el prefijo (ej: "ARE")
        $soloNumero = substr($codigo,3);
        //Convertir a entero
        $numeroActual = (int) $soloNumero;
        //Incrementar en 1
        $numeroSiguiente = $numeroActual + 1;
    }else{
        $numeroSiguiente = 1;
    }

    //Rellenar ceros a la izquierda
    $numeroFormateado = str_pad($numeroSiguiente,4,'0',STR_PAD_LEFT);

    //Unir y enviar
    return $prefijo . $numeroFormateado;
}