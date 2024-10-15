<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/medicos', [MedicoController::class, 'index']);
Route::get('/medicos/{id}', [MedicoController::class, 'show']);
Route::post('/medicos', [MedicoController::class, 'store']);
Route::put('/medicos/{id}', [MedicoController::class, 'update']);
Route::put('/medicos/{id}', [MedicoController::class, 'soft_delete']);
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy']);