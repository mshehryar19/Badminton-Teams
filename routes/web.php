<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\Admin\RolesAndPermissionsController;

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



Route::middleware('auth')->group(function () {
    Route::resource('teams', TeamController::class);
});


        Route::middleware(['role:admin'])
            ->prefix('admin')
            ->group(function () {

            Route::get('/roles-permissions', [RolesAndPermissionsController::class, 'index'])
                ->name('admin.roles.index');

            Route::post('/roles', [RolesAndPermissionsController::class, 'storeRole']);
            Route::post('/permissions', [RolesAndPermissionsController::class, 'storePermission']);
            Route::post('/roles/{role}/permissions', [RolesAndPermissionsController::class, 'updateRolePermissions']);
            Route::delete('/roles/{role}', [RolesAndPermissionsController::class, 'deleteRole']);

            Route::get('/users', [RolesAndPermissionsController::class, 'users']);
            Route::post('/users/{user}/assign-role', [RolesAndPermissionsController::class, 'assignRole']);
        });



        Route::middleware('role:admin')->group(function () {

            Route::resource('tournaments', TournamentController::class);

            Route::post('/tournaments/{tournament}/register',
                [TournamentController::class, 'registerTeams']
            )->name('tournaments.register');

            Route::post('/tournaments/{tournament}/generate-matches',
                [TournamentController::class, 'generateMatches']
            )->name('tournaments.generate');

            Route::get('/matches/{match}/score',
                [MatchController::class, 'score']
            )->name('matches.score');

            Route::post('/matches/{match}/score',
                [MatchController::class, 'storeScore']
            )->name('matches.storeScore');

            Route::post(
                    '/tournaments/{tournament}/next-round',
                    [TournamentController::class, 'generateNextRound']
                )->name('tournaments.nextRound');

        });

