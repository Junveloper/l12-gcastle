<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Browsershot\Browsershot;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// Generate pricing PDF route
Route::get('/generate-pricing-pdf', function () {
    $html = view('pricing-pdf')->render();

    return response(
        Browsershot::html($html)
            ->format('A4')
            ->margins(5, 5, 0, 5)
            ->showBackground()
            ->paperSize(210, 297)
            ->noSandbox()
            ->pdf(),
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="gcastle-pricing.pdf"',
        ]
    );
})->name('generate.pricing.pdf');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
