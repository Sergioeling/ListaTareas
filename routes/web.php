<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
    Route::post('/', [TareaController::class, 'store'])->name('tareas.store');
    Route::delete('/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    Route::get('/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('/{id}', [TareaController::class, 'update'])->name('tareas.update');
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    // ruta del dasboar Profile
    Route::get('/dashboard', function () {
        return view('profile.show');
    })->name('dashboard');
});
