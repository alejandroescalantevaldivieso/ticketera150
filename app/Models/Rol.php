<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";
    protected $primaryKey = "rol_codigo";
    protected $keyType = "char";

    public $incrementing = false;

    protected $fillable =[
        'rol_codigo',
        'rol_nombre',
        'rol_descripcion'
    ];
}
