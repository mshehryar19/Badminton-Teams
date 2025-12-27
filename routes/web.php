<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Route::middleware('auth')->group(function () {
//     Route::get('/teams', [TeamController::class, 'index']);
//     Route::get('/teams/create', [TeamController::class, 'create']);
//     Route::post('/teams', [TeamController::class, 'store']);
//     Route::get('/teams/{team}/edit', [TeamController::class, 'edit']);
//     Route::put('/teams/{team}', [TeamController::class, 'update']);
//     Route::delete('/teams/{team}', [TeamController::class, 'destroy']);
// });

Route::middleware('auth')->group(function () {
    Route::resource('teams', TeamController::class);
});
