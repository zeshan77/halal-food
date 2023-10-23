<?php

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






Route::group([
    'prefix' => 'posts',
    'controller' => PostController::class,
    'as' => 'posts.'
], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');

    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::put('/{post}', 'update')->name('update');

    Route::get('/{post}/delete', 'delete')->name('delete');
    Route::delete('/{post}', 'destroy')->name('destroy');
});
