<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;


//Route::get('/', function () {
//    return view('tarea.index');
//});

Route::get('/', [TareaController::class, 'index']);
Route::post('/', [TareaController::class, 'store']);
Route::delete('/{id}', [TareaController::class, 'destroy'])->name('title.destroy');
Route::get('/{id}/edit', [TareaController::class, 'edit'])->name('title.edit');
Route::put('/{id}', [TareaController::class, 'update'])->name('title.update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
