<?php

use App\Http\Controllers\ConexaoController;
use App\Http\Controllers\FeedAtividadeController;
use App\Http\Controllers\MembrosProjetoController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\ProjetoMusicalController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [UsuarioController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [UsuarioController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [UsuarioController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [UsuarioController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [UsuarioController::class, 'delete'])->middleware(['auth', 'verified']);
});
Route::group(['prefix' => 'musicas'], function () {
    Route::get('/', [MusicaController::class, 'index'])->name('musicas')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [MusicaController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [MusicaController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [MusicaController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [MusicaController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [MusicaController::class, 'delete'])->middleware(['auth', 'verified']);
});
Route::group(['prefix' => 'conexoes'], function () {
    Route::get('/', [ConexaoController::class, 'index'])->name('conexoes')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [ConexaoController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [ConexaoController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [ConexaoController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [ConexaoController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [ConexaoController::class, 'delete'])->middleware(['auth', 'verified']);
});
Route::group(['prefix' => 'projetomusical'], function () {
    Route::get('/', [ProjetoMusicalController::class, 'index'])->name('projetomusical')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [ProjetoMusicalController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [ProjetoMusicalController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [ProjetoMusicalController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [ProjetoMusicalController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [ProjetoMusicalController::class, 'delete'])->middleware(['auth', 'verified']);
});
Route::group(['prefix' => 'membrosprojeto'], function () {
    Route::get('/', [MembrosProjetoController::class, 'index'])->name('membrosprojeto')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [MembrosProjetoController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [MembrosProjetoController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [MembrosProjetoController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [MembrosProjetoController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [MembrosProjetoController::class, 'delete'])->middleware(['auth', 'verified']);
});
Route::group(['prefix' => 'feedatividades'], function () {
    Route::get('/', [FeedAtividadeController::class, 'index'])->name('feedatividades')->middleware(['auth', 'verified']);
    Route::get('/cadastro', [FeedAtividadeController::class, 'showForm'])->middleware(['auth', 'verified']);
    Route::post('/cadastro', [FeedAtividadeController::class, 'store'])->middleware(['auth', 'verified']);
    Route::get('/visualizar/{id}', [FeedAtividadeController::class, 'show'])->middleware(['auth', 'verified']);
    Route::post('/salvar/{id}', [FeedAtividadeController::class, 'update'])->middleware(['auth', 'verified']);
    Route::delete('/delete/{id}', [FeedAtividadeController::class, 'delete'])->middleware(['auth', 'verified']);
});




require __DIR__.'/auth.php';
