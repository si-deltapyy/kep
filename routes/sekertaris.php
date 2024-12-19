<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ECDocumentController;
use App\Http\Controllers\SekertarisController;

Route::middleware(['auth', 'verified', 'role:sekertaris'])->name('sekertaris.')->prefix('sekertaris')->group(function(){

    Route::post('/update-password', [SekertarisController::class, 'updatePassword'])->name('update-password');

    Route::resource('ajuan', SekertarisController::class)->names('pengajuan');
    Route::post('/ajuan/{id}/expedited', [SekertarisController::class, 'expedited'])->name('pengajuan.expedited');
    Route::get('/ajuan/{id}/extempted', [SekertarisController::class, 'extempted'])->name('pengajuan.extempted');
    Route::post('/ajuan/{id}/all', [SekertarisController::class, 'all'])->name('pengajuan.all');

    Route::get('/uploadEC/{id}', [SekertarisController::class, 'upload'])->name('upload.ec');
    Route::resource('ECDokumen', ECDocumentController::class)->names('ec');

    Route::get('/reviewerList', [UserController::class, 'rev'])->name('review.index');
    Route::get('/reviewerList/{id}/edit', [UserController::class, 'edit'])->name('review.edit');
    Route::put('/reviewerList/{id}', [UserController::class, 'update'])->name('review.update');
    Route::delete('/reviewerList/{id}', [UserController::class, 'destroy'])->name('review.destroy');


    // Pesan
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/pesan/{id}/edit', [PesanController::class, 'edit'])->name('pesan.show');

});

