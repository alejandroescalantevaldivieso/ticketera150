<?php
namespace App\Services;


use App\Models\Area;

class AreaService{
    public function registrar(array $data){
        $data['area_codigo'] =  generarCodigo('ARE',Area::class,'area_codigo');
        return Area::create($data);
    }

    public function actualizar(array $data){
        return Area::where('area_codigo',$data['area_codigo'])->update($data);
    }   

    public function eliminar(string $area_codigo){       
        return Area::where('area_codigo',$area_codigo)->update(['area_estado'=>'E']);
    }

    public function recuperar(string $area_codigo){
        return Area::where('area_codigo',$area_codigo)->update(['area_estado'=>'A']);
    }

    public function listar(){
        return Area::where('area_estado','A')->get();
    }

    public function listarEliminado(){
        return Area::where('area_estado','E')->get();
    }
}