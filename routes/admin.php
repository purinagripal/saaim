<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ArchivoController;
use App\Http\Controllers\Admin\ConsultaController;
use App\Http\Controllers\Admin\ExpedienteController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/', [HomeController::class, 'index']);

// CRUD de Usuarios
Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');

// CRUD de Expedientes
Route::resource('expedientes', ExpedienteController::class)->names('admin.expedientes');
// Extra - Crear expediente de usuario registrado
Route::get('expedientes/createusu/{usuario}', [ExpedienteController::class, 'createUsu'])->name('admin.expedientes.createUsu');
Route::post('expedientes/storeusu/{usuario}', [ExpedienteController::class, 'storeUsu'])->name('admin.expedientes.storeUsu');

// CRUD de Archivos
Route::resource('archivos', ArchivoController::class)->names('admin.archivos');
// Extra - Archivo de expediente
Route::get('archivos/createExp/{expediente}', [ArchivoController::class, 'createExp'])->name('admin.archivos.createExp');

// CRUD de Consultas
Route::resource('consultas', ConsultaController::class)->names('admin.consultas');
// Extra - Crear consulta con expediente o usuario registrado
Route::get('consultas/createexp/{usuario}/{expedienteid?}', [ConsultaController::class, 'createExp'])->name('admin.consultas.createexp');
Route::post('consultas/storeexp/{usuario}', [ConsultaController::class, 'storeExp'])->name('admin.consultas.storeexp');