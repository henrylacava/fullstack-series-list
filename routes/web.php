<?php

use App\Http\Controllers\SerieController;
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

Route::get('/series', [SerieController::class, 'index']);

Route::get('/series/create', [SerieController::class, 'create']);
Route::post('/series/store', [SerieController::class, 'store']);

Route::get('/series/edit/{id}', [SerieController::class, 'edit']);

Route::put('/series/update/{id}', [SerieController::class, 'update']);

Route::get('/series/delete/{id}', [SerieController::class, 'destroy']);
