<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('landing');});
Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Test Route
Route::get('/chat', function () {
    return view('pages.pesan.index');
});

Route::get('/message-show', function () {
    return view('pages.pesan.show');
})->name('message-show');

require __DIR__.'/auth.php';
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/reviewer.php';
require __DIR__ . '/sekertaris.php';
require __DIR__ . '/superadmin.php';
require __DIR__ . '/kppm.php';
