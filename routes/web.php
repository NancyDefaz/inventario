<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventarioController;// Agrega el controlador de Prenda
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [InventarioController::class, 'dashboard'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/inventario/{localId}', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/inventario/create/{localId}', [InventarioController::class, 'create'])->name('inventario.create');

    Route::post('/inventario/{localId}/store', [InventarioController::class, 'store'])->name('inventario.store');
    Route::post('/inventario/{localId}/{prendaId}', [InventarioController::class, 'actualizarInventario'])->name('inventario.actualizar');
    Route::delete('/inventario/{localId}/{prendaId}', [InventarioController::class, 'eliminarPrenda'])->name('inventario.eliminar');
});



require __DIR__.'/auth.php';
