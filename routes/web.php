<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IngredientController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {

	// Muestro los productos disponibles
    Route::get('/home', [ProductController::class,'index'])->name('home');

    // Muestro los productos disponibles
	Route::get('/products', [ProductController::class,'index'])->name('products.index');

	// formulario para crear un nuevo producto
	Route::get('/products/new', [ProductController::class,'create'])->name('product.new');

	// muestro el detalle del producto
	// param: number
	// Rerturn view
	Route::get('/products/show/{id}', [ProductController::class,'show'])->name('product.show');

	// Formulario para ediatar el producto
	// param: number
	// Rerturn view
	Route::get('/products/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
	//Route::get('/products/delete/{id}', [ProductController::class,'delete'])->name('product.delete');

	// Capturo la informacion del formulario del nuevo producto
    Route::put('/new/product/',  [ProductController::class,'store'])->name('product.form.new');

    // Capturo la informacion del formulario producto que se esta editando
    Route::put('/update/product/{id}/',  [ProductController::class,'update'])->name('product.form.update');

    // Elimino el producto que se ha selecionado
    Route::delete('/delete/product/',  [ProductController::class,'destroy'])->name('product.form.delete');


    // Muestra los ingrendientes de un producto
	// param: number
	// Rerturn view
	Route::get('/ingredient/{id}/', [IngredientController::class,'index'])->name('product.ingredient');

	// Guardo un nuevo ingredniente
	// Rerturn redirect
    Route::put('/new/ingredient/',  [IngredientController::class,'store'])->name('ingredient.form.new');

    //Elimino un ingrediente
	// Rerturn redirect
	Route::delete('/ingredient/', [IngredientController::class,'destroy'])->name('ingredient.form.delete');

});

