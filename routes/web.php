<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
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


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::view('/dashboard', 'dashboard')
    ->middleware('auth');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/login', [LoginController::class, 'show'])
    ->name('login')
    ->middleware('throttle:5,1');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::group([
    'prefix' => 'posts',
    'controller' => PostController::class,
    'as' => 'posts.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')
        ->name('create')
        ->can('create-post');

    Route::post('/', 'store')
        ->name('store')
        ->can('create-post');

    Route::get('/{post}/show', 'show')->name('show');

    Route::get('/{post}/edit', 'edit')
        ->name('edit')
        ->can('update-post');

    Route::put('/{post}', 'update')
        ->name('update')
        ->can('update-post');

    Route::get('/{post}/delete', 'delete')
        ->name('delete')
        ->can('delete-post');

    Route::delete('/{post}', 'destroy')
        ->name('destroy')
        ->can('delete-post');
});
