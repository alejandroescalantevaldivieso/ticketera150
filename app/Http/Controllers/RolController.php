<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolService;

class RolController
{
    protected RolService $rolService;

    public function __construct(RolService $rolService){
        $this->rolService = $rolService;
    }

    public function listar(){
        try{
            $rol = $this->rolService->listar();
            if($rol->isEmpty()){
                return response()->json(['exito'=>false,'mensaje'=>'No hay rol registrados']);
            }
            return response()->json(['exito'=>true,'mensaje'=>$rol]);
        }catch(\Exception $e){
            return response()->json(['exito'=>false,'mensaje'=>'Error al listar rol']);
        }
    }
}
