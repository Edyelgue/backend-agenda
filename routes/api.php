<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Medicos
Route::get('/medicos', [
    MedicoController::class, 'index'
]);
Route::get('/medicos/{id}', [
    MedicoController::class, 'show'
]);
Route::post('/medicos', [
    MedicoController::class, 'store'
]);
Route::put('/medicos/{id}', [
    MedicoController::class, 'update'
]);
Route::put('/medicos/{id}', [
    MedicoController::class, 'soft_delete'
]);
Route::delete('/medicos/{id}', [
    MedicoController::class, 'destroy'
]);

// Pacientes
Route::get('/pacientes', [
    PacienteController::class, 'index'
]);
Route::get('/pacientes/{id}', [
    PacienteController::class, 'show'
]);
Route::post('/pacientes', [
    PacienteController::class, 'store'
]);
Route::put('/pacientes/{id}', [
    PacienteController::class, 'update'
]);
Route::delete('/pacientes/{id}', [
    PacienteController::class, 'destroy'
]);