<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('products/pdf',[App\Http\Controllers\ProductController::class, 'pdf'])->name('products.pdf');

Route::get('/', ['MainController::class','index'])->name('main');
// Route::get('/', 'MainController@index')->name('main');
// Route::get('{value}', function($value){
//     return $value;
// });

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);

Route::resource('payments', PaymentController::class);


// Route::get('/products',[ProductController::class, 'index'])->name('products.index');

// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route::post('/products',[ProductController::class, 'store'])->name('products.store');
    
// Route::get('/products/{product}',[ProductController::class, 'show'])->name('products.show');
    
// Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
    
// Route::match(['put', 'patch'],'/products/{product}',[ProductController::class, 'update'])->name('products.update');
    
// Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');

// Route::get('products/create', 'ProductController@create')->name('products.create');

// Route::post('products', 'ProductController@store')->name('products.store');

// Route::get('products/{product}', 'ProductController@show')->name('products.show');

// Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}', 'ProductController@update')->name('products.update');

// Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
