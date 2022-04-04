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
    Route::get('/teams/index', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team_id}/show', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/teams/{team_id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/update', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/destroy', [TeamController::class, 'destroy'])->name('teams.destroy');
});

Route::prefix('')->group(function () {
    Route::get('/matches/index', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match_id}/show', [MatchController::class, 'show'])->name('matches.show');
    Route::get('/matches/{match_id}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/update', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/destroy', [MatchController::class, 'destroy'])->name('matches.destroy');
    // Not CRUD
    Route::get('/matches/{match_id}/play', [MatchController::class, 'getPlay'])->name('matches.play');
    Route::put('/matches/play', [MatchController::class, 'putPlay'])->name('matches.play.put');
    Route::get('/matches/{match_id}/play/auto', [MatchController::class, 'getPlayAuto'])->name('matches.play.auto');
});