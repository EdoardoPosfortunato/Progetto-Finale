<?php

use App\Http\Controllers\Admin\BonsaiController;
use App\Http\Controllers\Admin\SpeciesController;
use App\Http\Controllers\Admin\TipologyController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('bonsai', BonsaiController::class)->middleware(['auth', 'verified']);
Route::resource('species', SpeciesController::class)->middleware(['auth', 'verified']);
Route::resource('tipology', TipologyController::class)->middleware(['auth', 'verified']);

Route::get('/bonsai/specie/{species}', [BonsaiController::class, 'bySpecie'])
    ->name('bonsai.bySpecie');

Route::get('/bonsai/tipology/{tipologies}', [BonsaiController::class, 'byTipology'])
    ->name('bonsai.byTipology');

require __DIR__ . '/auth.php';
