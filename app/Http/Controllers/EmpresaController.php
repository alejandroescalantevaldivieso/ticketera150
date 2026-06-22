<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\EmpresaRegistrarRequest;
use App\Http\Requests\EmpresaActualizarRequest;
use App\Services\EmpresaService;

class EmpresaController
{
    protected EmpresaService $empresaService;

    public function __construct(EmpresaService $empresaService){
        $this->empresaService = $empresaService;
    }
    // Registrar
    public function registrar(EmpresaRegistrarRequest $request){
        try{
            $this->empresaService->registrar($request->validated());

            return response()->json([
                'exito'=>true,
                'mensaje'=>'Empresa registrada'
                ]);
        }catch(\Exception $e){            
            Log::error($e->getMessage());

            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al registrar'
            ]);
        }
    }
    // Actualizar
    public function actualizar(EmpresaActualizarRequest $request){
        try{
            $this->empresaService->actualizar($request->validated());

            return response()->json([
                'exito' => true,
                'mensaje' => 'Empresa actualizada'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'exito' => true,
                'mensaje' => 'Error al actualizar'
            ]);
        }
    }
    // Eliminar
    public function eliminar(Request $request){
        try{
            $this->empresaService->eliminar($request->input('empresa_codigo'));

            return response()->json([
                'exito' => true,
                'mensaje' => 'Empresa eliminada'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al eliminar'
            ]);
        }
    }
    // Recuperar
    public function recuperar(Request $request){
        try{
            $this->empresaService->recuperar($request->input('empresa_codigo'));

            return response()->json([
                'exito' => true,
                'mensaje' => 'Empresa recuperada'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al recuperar'
            ]);
        }
    }
    // Listar
    public function listar(){
        try{
            $empresa = $this->empresaService->listar();

            if($empresa->isEmpty()){
                return response()->json([
                    'exito' => false,
                    'mensaje' => "No hay empresas registradas"
                ]);
            }else{
                return response()->json([
                    'exito' => true,
                    'mensaje' => $empresa
                ]);
            }
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al listar'
            ]);
        }
    }
    // Listar eliminados
    public function listarEliminado(){
        try{
            $empresa = $this->empresaService->listarEliminado();

            return response()->json([
                'exito' => true,
                'mensaje' => $empresa
            ]);
        }catch(\Exception $e){
            Log:error($e->getMessage());

            return response()->json([
                'exito' =>false,
                'mensaje' => 'Error al listar eliminados'
            ]);
        }
    }
    // Ultimo codigo
    public function ultimoCodigo(){
        try{
            $empresa_codigo = $this->empresaService->ultimoCodigo();

            return response()->json([
                'exito' => true,
                'mensaje' => $empresa_codigo
            ]);
        }catch(\Exception $e){
            Log::errro($e->getMessage());
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al obtener el ultimo codigo'
            ]);
        }
    }
    public function vista(){
        return view('empresa');
    }
}
