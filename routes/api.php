<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;

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

Route::post('/register', [AppUserController::class, 'register']);
Route::post('/login', [AppUserController::class, 'login']);

Route::get('/users', [AppUserController::class, 'index']);

Route::get('/categories/{userId}', [CategoryController::class, 'show']);
Route::post('/categories/create', [CategoryController::class, 'store']);

Route::get('/todos/{userId}', [TodoController::class, 'show']);
Route::get('/todos/show/{categoryId}', [TodoController::class, 'showByCategory']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::put('/todos/update/{todoId}', [TodoController::class, 'update']);
Route::delete('/todos/delete/{todoId}', [TodoController::class, 'destroy']);