<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Services\EmpleadoService;
use App\Requests\EmpleadoRegistrarRequest;
use App\Requests\EmpleadoActualizarRequest;


class EmpleadoController
{
    protected EmpleadoService $empleadoService;

    public function __construct(EmpleadoService $empleadoService){
        $this->empleadoService = $empleadoService;
    }
// Registrar
    public function registrar(EmpleadoRegistrarRequest $request){
        try{
            $this->empleadoService->registrar($request->validated());

            return response()->json(['exito'=>true,'mensaje'=>'Empleado registrado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en registrar']);
        }        
    }
// Actualizar
    public function actualizar(EmpleadoActualizarRequest $request){
        try{
            $this->empleadoService->actualizar($request->validated());

            return response()->json(['exito'=>true,'mensaje'=>'Empleado actualizado']);            
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en actualizar']);
        }
    }
// Eliminar
    public function eliminar(Request $request){
        try{
            $this->empleadoService->eliminar($request->input('empleado_codigo'));

            return response()->json(['exito'=>true,'mensaje'=>'Empleado eliminado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en eliminar']);
        }
    }
// Recuperar
    public function recuperar(Request $request){
        try{
            $this->empleadoService->recuperar($request->input('empleado_codigo'));

            return response()->json(['exito'=>true,'mensaje'=>'Empleado eliminado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en recuperar']);
        }
    }
// Listar
    public function listar(){
        try{
            $empleado = $this->empleadoService->listar();

            if($empleado->isEmpty){
                return response()->json(['exito'=>false,'mensaje'=>'No hay empleado registrados']);
            }

            return response()->json(['exito'=>true,'mensaje'=>$empleado]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en listar']);
        }
    }
// Listar eliminado
    public function listarEliminado(){
        try{
            $empleado = $this->empleadoService->listarEliminado();

            return response()->json(['exito'=>true,'mensaje'=>$empleado]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en listar eliminado']);
        }
    }
// Ultimo codigo
    public function ultimoCodigo(){
        try{
            $empleado_codigo = $this->empleadoService->ultimoCodigo();

            return response()->json(['exito'=>true,'mensaje'=>$empleado_codigo]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false,'mensaje'=>'Error en ultimo codigo']);
        }
    }
// Vista
    public function vista(){
        return view('empleado');
    }

}
