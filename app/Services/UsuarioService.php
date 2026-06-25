<?php
namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService{

    public function registrar(array $usuario){
        $usuario['usuario_contrasena'] = Hash::make($usuario['usuario_contrasena']);
        return Usuario::create($usuario);
    }
    public function actualizar(array $usuario){
        $usuario['usuario_contrasena'] = Hash::make($usuario['usuario_contrasena']);
        return Usuario::where('usuario_codigo',$usuario['usuario_codigo'])->update($usuario);
    }
    public function eliminar(string $usuario_codigo){
        return Usuario::where('usuario_codigo',$usuario_codigo)->update(['usuario_estado'=>'E']);
    }
    public function recuperar(string $usuario_codigo){
        return Usuario::where('usuario_codigo',$usuario_codigo)->update(['usuario_estado'=>'A']);
    }
    public function listar(){
        return Usuario::where('usuario_estado','A')->get();
    }
    public function listarEliminado(){
        return Usuario::where('usuario_estado','E')->get();
    }
    public function ultimoCodigo(){
        return generarCodigo('USU',Usuario::class,'usuario_codigo');
    }
    public function validar(array $usuario){
        $usuarioEncontrado = Usuario::where('usuario_nombre',$usuario['usuario_nombre'])->first();

        if(!$usuarioEncontrado){
            return [];
        }
        
        if( Hash::check( $usuario['usuario_contrasena'], $usuarioEncontrado->usuario_contrasena ) ){
            return $usuarioEncontrado;
        }
            return [];
        
    }
}