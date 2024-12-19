<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:super_admin'])->name('superadmin.')->prefix('Administrator')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });
});
