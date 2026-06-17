<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $primaryKey =  "empresa_codigo"; 
    protected $keyType = "char";
    public $incrementing = false;
    protected $fillable =[
        'empresa_codigo',
        'empresa_nombre'
    ];
}
