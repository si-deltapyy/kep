<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ECDocumentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('ajuan', AdminController::class)->names('pengajuan');
    Route::get('/ajuan/{id}/assign', [AdminController::class, 'assign'])->name('pengajuan.assign');

    //EC Document
    Route::resource('ECDokumen', ECDocumentController::class)->names('ec');
    Route::get('ec/preview/{id}', [ECDocumentController::class, 'previewPDF'])->name('ec.previewPDF');

    //Template Setting
    Route::resource('template', TemplateController::class)->names('template');

    Route::resource('user/request', UserController::class)->names('user.request');
    Route::get('user/make-user/{user}', [UserController::class, 'makeUser'])->name('makeUser');
    Route::get('user/make-reviewer/{user}', [UserController::class, 'makeReviewer'])->name('makeReviewer');
    Route::get('ec/publish/{id}', [ECDocumentController::class, 'publish'])->name('ec.publish');
    Route::match(['get', 'post'], 'ec/reqSign/{id}', [ECDocumentController::class, 'signKPPM'])->name('ec.reqSign');
    Route::get('ec/log/{id}', [ECDocumentController::class, 'log'])->name('ec.log');

});
