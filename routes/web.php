<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/listerMangas', [MangaController::class, 'listerMangas']);
Route::get('/AjouterManga', [MangaController::class, 'AjouterManga']);
Route::post('/validerManga', [MangaController::class, 'ValiderManga'])-> name('postManga');
Route::get('/modifierManga/{id}', [MangaController::class, 'modifierManga'])->name('majManga');

