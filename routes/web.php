<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/movies', [MainController::class, 'indexMovie'])->name('movies.index');
Route::get('/movies/create', [MainController::class, 'create'])->name('movies.create');
Route::post('/movies/store', [MainController::class, 'store'])->name('movies.store');
