<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;

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
    return redirect('game');
});
Route::resource('game', GameController::class);
Route::resource('genre', GenreController::class);

Route::prefix('genre')->group(function () {
    Route::get('/create', [GenreController::class, 'create'])->name('genre.create');
    Route::post('/store', [GenreController::class, 'store'])->name('genre.store');
});

Route::prefix('game')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('games.index');
    Route::get('/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/store', [GameController::class, 'store'])->name('game.store');
    Route::delete('/destroy/{game}', [GameController::class, 'destroy'])->name('game.destroy');
    Route::get('/take/{game}', [GameController::class, 'take'])->name('games.take');
    Route::post('/take/{game}', [GameController::class, 'takeStore'])->name('games.takeStore');
});
