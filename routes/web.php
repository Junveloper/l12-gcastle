<?php

use App\Domains\Home\Http\Controllers\RenderHomePageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', RenderHomePageController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
