<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){

      
    Route::get('/home', function () {
        return view('home');
    });
    
    Route::get('category-trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::patch('category-trash/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('category-trash/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('categories/pdf', [CategoryController::class, 'downloadPdf'])->name('categories.pdf');
    
    Route::resource('categories', CategoryController::class);

    Route::get('products-trash', [CategoryController::class, 'trash'])->name('products.trash');
    Route::patch('products-trash/{id}', [CategoryController::class, 'restore'])->name('products.restore');
    Route::delete('products-trash/{id}', [CategoryController::class, 'delete'])->name('products.delete');
    Route::get('products/pdf', [CategoryController::class, 'downloadPdf'])->name('products.pdf');
    Route::resource('products', ProductController::class);

    Route::get('/profile', function () {
        return view('users.profile');
    });
    
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/change-role', [UserController::class, 'changeRole'])->name('change_role');
        Route::patch('/{user}/change-role', [UserController::class, 'updateRole'])->name('update_role');
    });
});



Route::fallback(function () {
    dd('Tomar chaoa puron korte parbona.....');
});
