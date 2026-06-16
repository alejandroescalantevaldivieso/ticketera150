<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('login');});
Route::get('principal',function(){return view('principal');});