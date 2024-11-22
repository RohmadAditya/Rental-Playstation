<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', [GameController::class, 'dashboardView'])->name('dashboard');
Route::get('/admin/games', [GameController::class, 'index'])->name('game-index');
Route::get('/admin/games-create', [GameController::class, 'createGames']);
Route::post('/admin/games-store', [GameController::class, 'storeGames'])->name('store-game');

// Route::get('/admin/games', [GameController::class, 'showGames'])->name('show-game');
