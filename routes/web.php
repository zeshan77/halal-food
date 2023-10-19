<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);


Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', function () {
    return view('posts');
})->name('posts.create');


Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);


//GET
// POST
// DELETE
// PUT
// PATCH

// procurement/abc
