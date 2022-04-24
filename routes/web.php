<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuotationController;

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

Route::get('/', [ViewController::class, 'view_index'])->name('el-gran-camaron');

Route::get('/el-gran-camaron', [ViewController::class, 'view_index'])->name('el-gran-camaron');

Route::get('/sobre-nosotros', [ViewController::class, 'view_about'])->name('sobre-nosotros');

Route::get('/contacto', [ViewController::class, 'view_contact'])->name('contacto');

Route::get('/productos/{category}', [ViewController::class, 'view_products'])->name('productos');

Route::post('/buscar-producto', [ViewController::class, 'search_product'])->name('buscar-producto');

Route::get('/cotizacion/{product}', [ViewController::class, 'view_quotation'])->name('cotizacion');

Route::post('/cotizacion/{product}', [QuotationController::class, 'create_quotation'])->name('cotizacion');

Auth::routes();

Route::group(['middleware'=>'auth'], function(){

    // Routes de vistas principales (ViewController)

    Route::get('/panel-administrativo', [ViewController::class, 'view_user'])->name('panel-administrativo');

    // Routes de CRUD Usuarios (ViewController - UserController)

    Route::get('/ver-usuarios', [ViewController::class, 'view_user'])->name('ver-usuarios');

    Route::get('/crear-usuario', [ViewController::class, 'view_create_user'])->name('crear-usuario');

    Route::post('/crear-usuario', [UserController::class, 'create_user'])->name('crear-usuario');

    Route::get('/actualizar-usuario/{id}', [ViewController::class, 'view_update_user'])->name('actualizar-usuario');

    Route::post('/actualizar-usuario/{id}', [UserController::class, 'update_user'])->name('actualizar-usuario');

    Route::get('/eliminar-usuario/{id}', [ViewController::class, 'view_delete_user'])->name('eliminar-usuario');

    Route::post('/eliminar-usuario/{id}', [UserController::class, 'delete_user'])->name('eliminar-usuario');

    // Routes de CRUD Categorias (ViewController - CategoryController)

    Route::get('/ver-categorias', [ViewController::class, 'view_category'])->name('ver-categorias');

    Route::get('/crear-categoria', [ViewController::class, 'view_create_category'])->name('crear-categoria');

    Route::post('/crear-categoria', [CategoryController::class, 'create_category'])->name('crear-categoria');

    Route::get('/actualizar-categoria/{id}', [ViewController::class, 'view_update_category'])->name('actualizar-categoria');

    Route::post('/actualizar-categoria/{id}', [CategoryController::class, 'update_category'])->name('actualizar-categoria');

    Route::get('/eliminar-categoria/{id}', [ViewController::class, 'view_delete_category'])->name('eliminar-categoria');

    Route::post('/eliminar-categoria/{id}', [CategoryController::class, 'delete_category'])->name('eliminar-categoria');

    // Routes de CRUD Productos (ViewController - ProductController)

    Route::get('/ver-productos', [ViewController::class, 'view_product'])->name('ver-productos');

    Route::get('/crear-producto', [ViewController::class, 'view_create_product'])->name('crear-producto');

    Route::post('/crear-producto', [ProductController::class, 'create_product'])->name('crear-producto');

    Route::get('/actualizar-producto/{id}', [ViewController::class, 'view_update_product'])->name('actualizar-producto');

    Route::post('/actualizar-producto/{id}', [ProductController::class, 'update_product'])->name('actualizar-producto');

    Route::get('/eliminar-producto/{id}', [ViewController::class, 'view_delete_product'])->name('eliminar-producto');

    Route::post('/eliminar-producto/{id}', [ProductController::class, 'delete_product'])->name('eliminar-producto');

    // Routes de CRUD Cotizaciones (ViewController - QuotationController)

    Route::get('/ver-cotizaciones', [ViewController::class, 'view_quotes'])->name('ver-cotizaciones');

    Route::get('/ver-cotizacion/{id}', [QuotationController::class, 'view_quotation_pdf'])->name('ver-cotizacion');

});

Route::get('404', function(){
    abort(404);
});
