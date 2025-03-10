<?php

use App\Http\Controllers\Web\DataController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\RedirectController;
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
    
Route::get('redirect/{id}', [RedirectController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('servants', ServantsController::class)
        ->except(['show'])
        ->names([
            'index' => 'servants',
            'create' => 'servants.create',
            'edit' => 'servants.edit',
            'update' => 'servants.update',
        ]);

    Route::get('servants/filter', [ServantsController::class, 'filter'])->name('servants.filter');
    Route::post('servants/import', [ServantsController::class, 'import'])->name('servants.import');

});

require __DIR__.'/auth.php';
