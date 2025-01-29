<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SuperAdmin\ManageWebsiteController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/maintenance/check', [ManageWebsiteController::class, 'checkMaintenance'])->name('maintenance.check');


Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


//Route Feedback untuk semua role
Route::middleware('auth')->group(function () {
    Route::get('/messages', [FeedbackController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [FeedbackController::class, 'create'])->name('messages.create');
    Route::post('/messages', [FeedbackController::class, 'store'])->name('messages.store');
    Route::get('/messages/{id}', [FeedbackController::class, 'show'])->name('messages.show');
    Route::get('/messages/detail/{id}', [FeedbackController::class, 'detail'])->name('messages.detail');
    Route::post('/messages/{id}/reply', [FeedbackController::class, 'reply'])->name('messages.reply');
    Route::put('/messages/{id}/done', [FeedbackController::class, 'selesaiReview'])->name('messages.selesaiReview');
});





Route::get('/message-show', function () {
    return view('pages.pesan.show');
})->name('message-show');


// Corn Job Routes

Route::middleware('restrict.cornjob')->group(function () {
    Route::get('/artisan/down', [Controller::class, 'down'])->name('app.down');
    Route::get('/artisan/up', [Controller::class, 'up'])->name('app.live');
    Route::get('/artisan/run', function () { Artisan::call('schedule:run'); return 'Optimize and Cache Clear Success';});
});

Route::get('/artisan/db', function () { Artisan::call('migrate:fresh --seed'); return 'Optimize and Cache Clear Success';});






require __DIR__.'/auth.php';
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/reviewer.php';
require __DIR__ . '/sekertaris.php';
require __DIR__ . '/superAdmin.php';
require __DIR__ . '/kppm.php';
require __DIR__ . '/sso.php';
