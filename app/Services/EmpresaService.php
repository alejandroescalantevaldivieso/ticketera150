<?php
namespace App\Services;

use App\Models\Empresa;

class EmpresaService{

    public function ultimoCodigo(){
        return generarCodigo('EPS',Empresa::class,'empresa_codigo');
    }
    public function registrar(array $empresa){
        $empresa['empresa_codigo'] = generarCodigo('EPS',Empresa::class,'empresa_codigo');
        return Empresa::create($empresa);
    }
    public function actualizar(array $empresa){
        return Empresa::where('empresa_codigo',$empresa['empresa_codigo'])->update($empresa);
    }
    public function eliminar(string $empresa_codigo){
        return Empresa::where('empresa_codigo',$empresa_codigo)->update(['empresa_estado'=>'E']);
    }
    public function recuperar(string $empresa_codigo){
        return Empresa::where('empresa_codigo',$empresa_codigo)->update(['empresa_estado'=>'A']);
    }
    public function listar(){
        return Empresa::where('empresa_estado','A')->get();
    }
    public function listarEliminado(){
        return Empresa::where('empresa_estado','E')->get();
    }    

}