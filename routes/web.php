<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {return view('login');});
Route::get('/principal',function(){return view('principal');});

// Area
Route::post('/area/registrar',[AreaController::class, 'registrar']);
Route::post('/area/actualizar',[AreaController::class, 'actualizar']);
Route::post('/area/eliminar',[AreaController::class, 'eliminar']);
Route::post('/area/recuperar',[AreaController::class, 'recuperar']);
Route::post('/area/listar',[AreaController::class, 'listar']);
Route::post('/area/listarEliminado',[AreaController::class, 'listarEliminado']);
Route::post('/area/ultimoCodigo',[AreaController::class,'ultimoCodigo']);
Route::get('/area/vistaArea',[AreaController::class,'vistaArea']);

// Empresa
Route::post('/empresa/registrar',[EmpresaController::class,'registrar']);
Route::post('/empresa/actualizar',[EmpresaController::class,'actualizar']);
Route::post('/empresa/eliminar',[EmpresaController::class,'eliminar']);
Route::post('/empresa/recuperar',[EmpresaController::class,'recuperar']);
Route::post('/empresa/listar',[EmpresaController::class,'listar']);
Route::post('/empresa/listarEliminado',[EmpresaController::class,'listarEliminado']);
Route::post('/empresa/ultimoCodigo',[EmpresaController::class,'ultimoCodigo']);
Route::get('/empresa/vista',[EmpresaController::class,'vista']);

// Empleado
Route::post('/empleado/registrar',[EmpleadoController::class, 'registrar']);
Route::post('/empleado/actualizar',[EmpleadoController::class, 'actualizar']);
Route::post('/empleado/eliminar',[EmpleadoController::class, 'eliminar']);
Route::post('/empleado/recuperar',[EmpleadoController::class, 'recuperar']);
Route::post('/empleado/listar',[EmpleadoController::class, 'listar']);
Route::post('/empleado/listarEliminado',[EmpleadoController::class, 'listarEliminado']);
Route::post('/empleado/ultimoCodigo',[EmpleadoController::class, 'ultimoCodigo']);
Route::get('/empleado/vista',[EmpleadoController::class, 'vista']);

// Rol
Route::post('/rol/listar',[RolController::class,'listar']);

// Usuario
Route::post('/usuario/registrar',[UsuarioController::class, 'registrar']);
Route::post('/usuario/actualizar',[UsuarioController::class, 'actualizar']);
Route::post('/usuario/eliminar',[UsuarioController::class, 'eliminar']);
Route::post('/usuario/recuperar',[UsuarioController::class, 'recuperar']);
Route::post('/usuario/listar',[UsuarioController::class, 'listar']);
Route::post('/usuario/listarEliminado',[UsuarioController::class, 'listarEliminado']);
Route::post('/usuario/ultimoCodigo',[UsuarioController::class, 'ultimoCodigo']);
Route::post('/usuario/cambiarContrasena',[UsuarioController::class, 'cambiarContrasena']);
Route::post('/usuario/validar',[UsuarioController::class, 'validar']);

Route::get('/usuario/vista',[UsuarioController::class, 'vista']);