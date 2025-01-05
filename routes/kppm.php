<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KppmController;
use App\Http\Controllers\ECDocumentController;


Route::middleware(['auth', 'verified', 'role:kppm'])->name('kppm.')->prefix('kppm')->group(function(){
    Route::resource('pengajuan', KppmController::class)->names('pengajuan');
    Route::get('ec/download-pdf/{id}', [ECDocumentController::class, 'downloadPDF'])->name('ec.download');
});
