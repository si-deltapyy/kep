<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FeedbackController;


Route::get('/', function () { return view('landing');});
Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/messages', [FeedbackController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [FeedbackController::class, 'create'])->name('messages.create');
    Route::post('/messages', [FeedbackController::class, 'store'])->name('messages.store');
    Route::get('/messages/{id}', [FeedbackController::class, 'show'])->name('messages.show');
    Route::get('/messages/detail/{id}', [FeedbackController::class, 'detail'])->name('messages.detail');
    Route::post('/messages/{id}/reply', [FeedbackController::class, 'reply'])->name('messages.reply');
});


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
require __DIR__ . '/superAdmin.php';
require __DIR__ . '/kppm.php';
