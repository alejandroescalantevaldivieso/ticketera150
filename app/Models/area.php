<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $table = "area";
    protected $primaryKey = "area_codigo";
    protected $keyType = "char";
    public $incrementing = false;

    protected $fillable = [
        'area_codigo',
        'area_nombre'
    ];
}
