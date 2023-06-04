<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => '/'], function () {

    Route::get('/', function () {
        return redirect('compras');
    });

    // productos
    Route::get('productos', [ProductoController::class, 'index'])->name('productos');
    Route::post('guardar-producto', [ProductoController::class, 'store'])->name('guardarProducto');
    Route::post('actualizar-producto', [ProductoController::class, 'update'])->name('actualizarProducto');
    Route::post('eliminar-producto', [ProductoController::class, 'delete'])->name('eliminarProducto');

    // categorias
    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias');

    //compras
    Route::get('compras', [CompraController::class, 'productosCompra'])->name('compras');
    Route::post('guardar-compra', [CompraController::class, 'guardarCompra'])->name('guardarCompra');

    //reportes
    Route::get('reportes', [ReporteController::class, 'index'])->name('reporntes');


});

