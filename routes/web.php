<?php

use App\Http\Controllers\Web\DataController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\ServantsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [DataController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/show', [DataController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('servants', ServantsController::class)
        ->except(['show'])
        ->names([
            'index' => 'servants',
            'show' => 'servants.show',
            'edit' => 'servants.edit'
        ]);

    Route::get('servants/show', [ServantsController::class, 'show'])->name('servants.show');
});

require __DIR__.'/auth.php';
