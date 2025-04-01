<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;

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

Route::get('/', action: function () {
    return view('home.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/home',[AdminController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Menampilkan daftar tugas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Form tambah task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Menyimpan task baru
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Form edit task
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Hapus task
