<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Tighten\Ziggy\Ziggy;

Route::get('/', [MainController::class, 'mainController'])->name('main');
Route::get('ziggy', fn() => response()->json(new Ziggy));
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')
    ->prefix('game')
    ->name('game.')
    ->controller(GameController::class)
    ->group(function () {
    Route::get('/odd-even', 'oddEvenVisit')->name('oddEven');
    Route::get('/graph', 'graphVisit')->name('graph');
    Route::get('/mine', 'mineVisit')->name('mine');

});

Route::middleware('auth')
    ->prefix('api')
    ->name('api.')
    ->group(function () {
        Route::controller(GameController::class)->group(function(){
            Route::post('/odd-even', 'oddEvenBetProc')->name('oddEven');
            Route::post('/graph', 'graphBetProc')->name('graph');
            Route::post('/mine', 'mineBetProc')->name('mine');
        });
    });

require __DIR__.'/auth.php';
