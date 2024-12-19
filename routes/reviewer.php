<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocRevController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewerController;


Route::middleware(['auth', 'verified', 'role:reviewer'])->name('reviewer.')->prefix('reviewer')->group(function(){
    Route::resource('pengajuan', ReviewerController::class)->names('pengajuan');
    Route::resource('dokumen/review' , DocRevController::class)->names('dokRev');
    Route::resource('message', MessageController::class)->names('message');

    Route::get('/dokumen/review/{id}/show', [DocRevController::class, 'pils'])->name('dokRev.pils');
});
