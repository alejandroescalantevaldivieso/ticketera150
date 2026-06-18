<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::get('/', function () {return view('login');});
Route::get('/principal',function(){return view('principal');});

// Area
Route::post('/area/registrar',[AreaController::class, 'registrar']);
Route::post('/area/actualizar',[AreaController::class, 'actualizar']);
Route::post('/area/eliminar',[AreaController::class, 'eliminar']);
Route::post('/area/recuperar',[AreaController::class, 'recuperar']);
Route::post('/area/listar',[AreaController::class, 'listar']);
Route::post('/area/listarEliminado',[AreaController::class, 'listarEliminado']);
Route::get('/area/vistaArea',[AreaController::class,'vistaArea']);