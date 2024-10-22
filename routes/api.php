<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Login
Route::post('/login', function (Request $request) {
    $credenciais = $request->only('email', 'password');

    if (Auth::attempt($credenciais)) {
        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "access_token" => $token,
            "token_type" => 'Bearer'
        ]);
    }

    return response()->json([
        "message" => "Usuário ou senha inválida."
    ]);
});

// Rotas protegidas por autenticação Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Medicos
    Route::get('/medicos', [
        MedicoController::class,
        'index'
    ]);
    Route::get('/medicos/{id}', [
        MedicoController::class,
        'show'
    ]);
    Route::post('/medicos', [
        MedicoController::class,
        'store'
    ]);
    Route::put('/medicos/{id}', [
        MedicoController::class,
        'update'
    ]);
    Route::put('/medicos/{id}', [
        MedicoController::class,
        'soft_delete'
    ]);
    Route::delete('/medicos/{id}', [
        MedicoController::class,
        'destroy'
    ]);

    // Pacientes
    Route::get('/pacientes', [
        PacienteController::class,
        'index'
    ]);
    Route::get('/pacientes/{id}', [
        PacienteController::class,
        'show'
    ]);
    Route::post('/pacientes', [
        PacienteController::class,
        'store'
    ]);
    Route::put('/pacientes/{id}', [
        PacienteController::class,
        'update'
    ]);
    Route::delete('/pacientes/{id}', [
        PacienteController::class,
        'destroy'
    ]);

    // Usuários
    Route::post('/usuarios', [
        UserController::class,
        'store'
    ]);
});
