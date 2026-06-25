<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// extenciones
use App\Models\Rol;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $primaryKey = "usuario_codigo";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'usuario_codigo',
        'usuario_nombre',
        'usuario_contrasena',
        'usuario_empleado_codigo',
        'usuario_rol_codigo',
        'usuario_estado'
    ];

    public function rol(){
        return $this->belongsTo(Rol::class, 'usuario_rol_codigo', 'rol_codigo');
    }
}
