<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrarAreaRequest;
use App\Http\Requests\ActualizarAreaRequest;
use App\Services\AreaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AreaController 
{
    protected AreaService $areaService;

    public function __construct(AreaService $areaService){
        $this->areaService = $areaService;
    }

   public function registrar(RegistrarAreaRequest $request){
       try{
            $area = $this->areaService->registrar($request->validated());

            return response()->json(['exito'=>true,'mensaje'=>'Area registrada']);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error al resgistrar area']);
        }
   }
   public function actualizar(ActualizarAreaResquest $request){
        try{
            $this->areaService->actualizar($request->validated());

            return response()->json(['exito'=>true, 'mensaje'=>'Area actualizada']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al actualizar area']);
        }
   }

   public function eliminar(Request $request){
        try{
            $this->areaService->eliminar($request->input('area_codigo'));

            return response()->json(['exito'=>true, 'mensaje'=>'Area eliminada']);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al eliminar area']);
        }
   }

   public function recuperar(Request $request){
        try{
            $this->areaService->recuperar($request->input('area_codigo'));
            
            return response()->json(['exito'=>true, 'mensaje'=>'Area recuperada']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al recuperar area']);
        }
   }

   public function listar(){
        try{
            $area = $this->areaService->listar();
            
            return response()->json(['exito'=>true, 'mensaje'=>$area]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al recuperar area']);
        }
   }

   public function listarEliminado(){
        try{
            $area = $this->areaService->listarEliminado();
            
            return response()->json(['exito'=>true, 'mensaje'=>$area]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al recuperar area']);
        }
   }
   public function vistaArea(){
        return view('area');
   }
}
