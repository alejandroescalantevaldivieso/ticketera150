<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRegistrarRequest;
use App\Http\Requests\UsuarioActualizarRequest;
use App\Services\UsuarioService;

use Illuminate\Support\Facades\Log;

class UsuarioController
{
    protected UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService){
        $this->usuarioService = $usuarioService;
    }

    public function registrar(UsuarioRegistrarRequest $request){
        try{
            $this->usuarioService->registrar($request->validated());

            return response()->json(['exito'=>true, 'mensaje'=>'Usuario registrado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al registrar']);
        }        
    }
    public function actualizar(UsuarioActualizarRequest $request){
        try{
            $this->usuarioService->actualizar($request->validated());
            return response()->json(['exito'=>true, 'mensaje'=>'Usuario actualizado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al actualizar']);
        }
    }
    public function eliminar(Request $request){
        try{
            $this->usuarioService->eliminar($request->input('usuario_codigo'));
            return response()->json(['exito'=>true, 'mensaje'=>'Usuario eliminado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al eliminar']);
        }
    }
    public function recuperar(Request $request){
        try{
            $this->usuarioService->recuperar($request->input('usuario_codigo'));

            return response()->json(['exito'=>true, 'mensaje'=>'Usuario recuperado']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al recuperar']);
        }

    }
    public function listar(){
        try{
            $usuarios = $this->usuarioService->listar();
            if($usuarios->isEmpty()){
                return response()->json(['exito'=>false, 'mensaje'=> 'No hay usuarios registrados']);
            }
            return response()->json(['exito'=>true, 'mensaje'=> $usuarios]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al listar']);
        }

    }
    public function listarEliminado(){
        try{
            $usuarios = $this->usuarioService->listarEliminado();
            return response()->json(['exito'=>true, 'mensaje'=>$usuarios]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al listar eliminado']);
        }

    }
    public function ultimoCodigo(){
        try{
            $usuario_codigo = $this->usuarioService->ultimoCodigo();

            return response()->json(['exito'=>true, 'mensaje'=>$usuario_codigo]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al obtener ultimo codigo']);
        }

    }
    public function validar(Request $request){
        try{
            $usuario = $this->usuarioService->validar($request);
            
            if($usuario->isEmpty()){
                return response()->json(['exito'=>false, 'mensaje'=>'Credenciales invalidas']);
            }

            return response()->json(['exito'=>true, 'mensaje'=>'Bienvenido']);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['exito'=>false, 'mensaje'=>'Error al registrar']);
        }
    }
    public function vista(){
        return view('usuario');
    }
}
