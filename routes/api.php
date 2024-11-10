<?php

use App\Http\Controllers\AgendaController;
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

Route::post('/usuarios', [
    UserController::class,
    'store'
])->name('usuarios.store');



// Rotas protegidas por autenticação Sanctum
Route::middleware(
    'auth:sanctum'
)->group(
    function () {

        // Agenda
        Route::get('/agenda', [
            AgendaController::class,
            'index'
        ])->name('agenda.index');

        Route::get('/agenda/{id}', [
            AgendaController::class,
            'show'
        ])->name('agenda.show');

        Route::post('/agenda', [
            AgendaController::class,
            'store'
        ])->name('agenda.store');

        Route::put('/agenda/{id}', [
            AgendaController::class,
            'update'
        ])->name('agenda.update');

        Route::delete('/agenda/{id}', [
            AgendaController::class,
            'destroy'
        ])->name('agenda.destroy');

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
            UserController::class,
            'show'
        ])->name('usuarios.show');

        // Route::post('/usuarios', [
        //     UserController::class,
        //     'store'
        // ])->name('usuarios.store');

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
        ])->name('medicos.index');

        Route::get('/medicos/{id}', [
            MedicoController::class,
            'show'
        ])->name('medicos.show');

        Route::post('/medicos', [
            MedicoController::class,
            'store'
        ])->name('medicos.store');

        Route::put('/medicos/{id}', [
            MedicoController::class,
            'update'
        ])->name('medicos.update');

        Route::delete('/medicos/{id}', [
            MedicoController::class,
            'destroy'
        ])->name('medicos.destroy');

        // Pacientes
        Route::get('/pacientes', [
            PacienteController::class,
            'index'
        ])->name('pacientes.index');
        Route::get('/pacientes/{id}', [
            PacienteController::class,
            'show'
        ])->name('pacientes.show');
        Route::post('/pacientes', [
            PacienteController::class,
            'store'
        ])->name('pacientes.store');
        Route::put('/pacientes/{id}', [
            PacienteController::class,
            'update'
        ])->name('pacientes.update');
        Route::delete('/pacientes/{id}', [
            PacienteController::class,
            'destroy'
        ])->name('pacientes.destroy');
    }
);
