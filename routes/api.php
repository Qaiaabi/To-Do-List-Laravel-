<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/tasks', [TaskController::class, 'index']); // Ambil semua tugas
Route::post('/tasks', [TaskController::class, 'store']); // Tambah tugas baru
Route::put('/tasks/{task}', [TaskController::class, 'update']); // Edit tugas
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
