<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'role:kppm'])->name('kppm.')->prefix('kppm')->group(function(){
    
});