<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para empresas
    Route::get('/', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
    Route::get('/empresas/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
    Route::put('/empresas/{id}', [EmpresaController::class, 'update'])->name('empresas.update');
    Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');
    Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy');
    


    // Rutas para contactos
    Route::get('empresas/contactos/create/{empresa_id}', [ContactoController::class, 'create'])->name('contactos.create');
    Route::post('empresas/contactos/create', [ContactoController::class, 'store'])->name('contactos.store');
    Route::get('empresas/contactos/{empresa_id}/edit/{id}', [ContactoController::class, 'edit'])->name('contactos.edit');
    Route::put('empresas/contactos/{empresa_id}/edit/{id}', [ContactoController::class, 'update'])->name('contactos.update');
});

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');
Route::get('/about-us', function () {
    return view('about');
})->name('about');
