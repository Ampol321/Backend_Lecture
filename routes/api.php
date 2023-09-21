<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts',PostController::class);
// Route::get('/posts',[PostController::class, 'index']);
// Route::get('/posts/create',[PostController::class, 'create']);
// Route::get('/posts/store',[PostController::class, 'store']);
// Route::get('/posts/edit/{id}',[PostController::class, 'edit']);
// Route::get('/posts/update/{id}',[PostController::class, 'update']);
// Route::get('/posts/delete/{id}',[PostController::class, 'destroy']);
