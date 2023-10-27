<?php


use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'store']);


Route::get('/posts', [PostController::class, 'index'])
    ->middleware(['auth:sanctum']);
