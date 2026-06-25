<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// extensiones
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";
    protected $primaryKey =  "empresa_codigo"; 
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable =[
        'empresa_codigo',
        'empresa_nombre',
        'empresa_estado'
    ];
}
