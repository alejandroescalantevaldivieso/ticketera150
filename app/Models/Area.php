<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "area";
    protected $primaryKey = "area_codigo";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'area_codigo',
        'area_nombre'
    ];
}
