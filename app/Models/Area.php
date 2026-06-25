<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// librerias extras
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{

    use HasFactory;

    protected $table = "area";
    protected $primaryKey = "area_codigo";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'area_codigo',
        'area_nombre'
    ];

}
