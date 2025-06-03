<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\filmesController;
use App\Http\Controllers\generosController;
use App\Http\Controllers\diretoresController;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;

// Rotas protegidas (autenticadas)
Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Página inicial
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('filmes', FilmesController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::resource('generos', generosController::class)->middleware('auth');

Route::resource('diretores', diretoresController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

// Autenticação padrão
require __DIR__ . '/auth.php';
