<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Empresa;

class Empleado extends Model
{
    protected $table = "empleado";
    protected $primaryKey = "empleado_codigo";
    public $keyType = "string";
    public $incrementing = false;

    protected $fillable =[
        'empleado_codigo',
        'empleado_nombre',
        'empleado_apellido_paterno',
        'empleado_apellido_materno',
        'empleado_correo',
        'empleado_area_codigo',
        'empleado_empresa_codigo'
    ];

    public function area(){
        return $this->belongsTo(
            Area::class,
            'empleado_area_codigo',
            'area_codigo'
        );
    }

    public function empresa(){
        return $this->belongsTo(
            Empresa::class,
            'empleado_empresa_codigo',
            'empresa_codigo'
        );
    }

}
