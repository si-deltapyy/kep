<?php
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ECDocumentController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:user'])->name('user.')->prefix('user')->group(function () {
    Route::middleware(['permission:done-profile'])->group(function () {
        Route::resource('ajuan', DocumentController::class)->names('ajuan');
        Route::resource('kuisioner', KuisionerController::class)->names('kuisioner');
        Route::resource('template', TemplateController::class)->names('template');
        Route::resource('message', MessageController::class)->names('message');
        Route::resource('ECDokumen', ECDocumentController::class)->names('ec');
    });

    Route::middleware(['permission:update-profile'])->group(function () {
        Route::get('profile/edit/{profil}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('profile/update/{profil}', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
});
