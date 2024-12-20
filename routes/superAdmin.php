<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdmin\ProdiController;
use App\Http\Controllers\SuperAdmin\TypeAjuanController;
use App\Http\Controllers\SuperAdmin\TypeDokumenController;

Route::middleware(['auth', 'verified', 'role:super_admin'])->name('superadmin.')->prefix('administrator')->group(function(){
    // Common
    Route::resource('data', SuperAdminController::class)->names('data');


    // Manage User
    Route::get('/manage/user', [SuperAdminController::class, 'manageUser'])->name('manage.user');
    Route::get('/manage/user/destroy/{id}', [SuperAdminController::class, 'manageUserDestroy'])->name('manage.user.destroy');
    Route::get('/manage/user/edit/{id}', [SuperAdminController::class, 'manageUserEdit'])->name('manage.user.edit');

    // Manage Reviewer
    Route::get('/manage/reviewer', [SuperAdminController::class, 'manageReviewer'])->name('manage.reviewer');
    Route::get('/manage/reviewer/destroy/{id}', [SuperAdminController::class, 'manageReviewerDestroy'])->name('manage.reviewer.destroy');
    Route::get('/manage/reviewer/edit/{id}', [SuperAdminController::class, 'manageReviewerEdit'])->name('manage.reviewer.edit');
    Route::post('/manage/reviewer/store', [SuperAdminController::class, 'reviewerStore'])->name('manage.reviewer.store');
    Route::get('/manage/reviewer/create', [SuperAdminController::class, 'reviewerCreate'])->name('manage.reviewer.create');

    // Manage Sekertaris
    Route::get('/manage/sekertaris', [SuperAdminController::class, 'manageSekertaris'])->name('manage.sekertaris');
    Route::get('/manage/sekertaris/destroy/{id}', [SuperAdminController::class, 'manageSekertarisDestroy'])->name('manage.sekertaris.destroy');
    Route::get('/manage/sekertaris/edit/{id}', [SuperAdminController::class, 'manageSekertarisEdit'])->name('manage.sekertaris.edit');
    Route::post('/manage/sekertaris/store', [SuperAdminController::class, 'sekertarisStore'])->name('manage.sekertaris.store');
    Route::get('/manage/sekertaris/create', [SuperAdminController::class, 'sekertarisCreate'])->name('manage.sekertaris.create');

    Route::post('/manage/store', [SuperAdminController::class, 'manageStore'])->name('manage.store');


    //Manage Prodi
    Route::resource('prodi', ProdiController::class);
    //Manage Ajuan Type
    Route::resource('typeajuan', TypeAjuanController::class);
    //Manage Document Type
    Route::resource('typedokumen', TypeDokumenController::class);



    // Change Password
    Route::get('/change/password', [SuperAdminController::class, 'changePassword'])->name('change.password');

    // Manage Role
    Route::get('/manage/role', [SuperAdminController::class, 'manageRole'])->name('manage.role');
    Route::get('/manage/permission', [SuperAdminController::class, 'managePermission'])->name('manage.permission');
    Route::get('/manage/password', [SuperAdminController::class, 'managePassword'])->name('manage.password');
    Route::get('/manage/prodi', [SuperAdminController::class, 'manageProdi'])->name('manage.prodi');
    Route::get('/manage/type-ajuan', [SuperAdminController::class, 'manageTypeAjuan'])->name('manage.type-ajuan');
    Route::get('/manage/document-type', [SuperAdminController::class, 'manageDocumentType'])->name('manage.document-type');
    Route::get('/manage/view', [SuperAdminController::class, 'manageView'])->name('manage.view');
});
