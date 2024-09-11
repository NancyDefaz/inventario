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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del sistema de inventario de prendas
Route::middleware('auth')->group(function () {
  //  Route::resource('prendas', PrendaController::class); // Rutas para las prendas

    //Route::post('prendas/{prenda}/registrar-salida', [PrendaController::class, 'registrarSalida'])->name('prendas.registrarSalida');
    //Route::post('prendas/{prenda}/agregar-stock', [PrendaController::class, 'agregarStock'])->name('prendas.agregarStock');
    Route::get('/inventario/create', [InventarioController::class, 'create'])->name('inventario.create');
    Route::post('/inventario/store', [InventarioController::class, 'store'])->name('inventario.store');

    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::post('/inventario/{id}', [InventarioController::class, 'actualizarInventario'])->name('inventario.actualizar');
    Route::delete('/inventario/{id}', [InventarioController::class, 'eliminarPrenda'])->name('inventario.eliminar');


});


require __DIR__.'/auth.php';
