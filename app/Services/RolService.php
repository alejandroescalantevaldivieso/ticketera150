<?php
namespace App\Services;

use App\Models\Rol;

class RolService{
    public function listar(){
        return Rol::all();
    }
}

