<?php
namespace App\Services;

use App\Models\Empleado;

class EmpleadoService{

    public function registrar(array $empleado){
        return Empleado::create($empleado);
    }
    public function actualizar(array $empleado){
        return Empleado::where('empleado_codigo',$empleado['empleado_codigo'])->update($empleado);
    }
    public function eliminar(string $empleado_codigo){
        return Empleado::where('empleado_codigo',$empleado_codigo)->update(['empleado_estado' => 'E']);
    }
    public function recuperar(string $empleado_codigo){
        return Empleado::where('empleado_codigo',$empleado_codigo)->update(['empleado_estado' => 'A']);
    }
    public function listar(){
        return Empleado::where('empleado_estado','A')->get();
    }
    public function listarEliminado(){
        return Empleado::where('empleado_estado','E')->get();
    }
    public function ultimoCodigo(){
        return generarCodigo('EPD',Empleado::class,'empleado_codigo');
    }

}