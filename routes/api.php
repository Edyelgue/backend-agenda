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

// Route::post('/usuarios', [
//     UserController::class,
//     'store'
// ])->name('usuarios.store');


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
        ]);

        Route::get('/usuarios/{id}', [
            UserController::class, 'show'
        ])->name('usuarios.show');

        Route::post('/usuarios', [
            UserController::class,
            'store'
        ])->name('usuarios.store');

        Route::put('/usuarios', [
            UserController::class,
            'update'
        ])->name('usuarios.update');

        Route::put('usuarios/{id}', [
            UserController::class,
            'destroy'
        ])->name('usuarios.destroy');

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
