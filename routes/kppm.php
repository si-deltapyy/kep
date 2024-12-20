<?php

use App\Http\Controllers\KppmController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'role:kppm'])->name('kppm.')->prefix('kppm')->group(function(){
    Route::resource('pengajuan', KppmController::class)->names('pengajuan');
});