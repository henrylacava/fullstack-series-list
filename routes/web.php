<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function() {
    return redirect('/series');
});

Route::middleware(Authenticator::class)->group(function () {
    Route::controller(SerieController::class)->group(function () {
        Route::get('/series', 'index')->name('serie.index');
        Route::get('/series/create', 'create')->name('serie.create');
        Route::post('/series/store', 'store')->name('serie.store');
        Route::get('/series/edit/{id}', 'edit')->name('serie.edit');
        Route::put('/series/update/{id}', 'update')->name('serie.update');
        Route::delete('/serie/delete/{id}', 'destroy')->name('serie.destroy');
    });

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'watch'])->name('episodes.watch');

});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class,  'store'])->name('users.store');

