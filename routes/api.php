<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;


// Realizar Login
Route::post('/login', [
    AuthController::class,
    'login'
])->name('login');


// Rotas protegidas por autenticação Sanctum
Route::middleware(
    'auth:sanctum'
    )->group(
        function () {
            
        //  Realizar logout
        Route::post('/logout', [
            AuthController::class,
            'logout'
        ]);
        
        // Usuarios
        Route::get('/usuarios', [
            UserController::class,
            'index'
        ])->name('usuarios.index');

        Route::get('/usuarios', [
            UserController::class, 'show'
        ])->name('usuarios.show');

        Route::post('/usuarios', [
            UserController::class,
            'store'
        ])->name('usuarios.store');

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
    }
);
