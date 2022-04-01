<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::prefix('')->group(function () {
    Route::get('/teams/list', [TeamController::class, 'list'])->name('teams.list');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}/show', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/update', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/destroy', [TeamController::class, 'destroy'])->name('teams.destroy');
});

Route::prefix('')->group(function () {
    Route::get('/matches/list', [MatchController::class, 'list'])->name('matches.list');
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{team}/show', [MatchController::class, 'show'])->name('matches.show');
    Route::get('/matches/{team}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/update', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/destroy', [MatchController::class, 'destroy'])->name('matches.destroy');
});