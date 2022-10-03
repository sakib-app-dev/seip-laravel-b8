<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//http verbs: get, post, put/patch, delete

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});



Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');


Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');











Route::get('/profile', function () {
    return view('users.profile');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        // Route::get('/{id}', function ($userId) {
        //     dd('showing---->' . $userId);
        // })->name('show');

        Route::get('/{id}', [UserController::class, 'show'])->name('show');
    });
});

Route::fallback(function () {
    dd('Tomar chaoa puron korte parbona.....');
});
