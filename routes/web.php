<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ECDocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocRevController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/a', [Controller::class, 'tes']);

Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:user'])->name('user.')->prefix('user')->group(function () {

    // Routes with 'permission:done-profile'
    Route::middleware(['permission:done-profile'])->group(function () {
        Route::resource('ajuan', DocumentController::class)->names('ajuan');
        Route::resource('kuisioner', KuisionerController::class)->names('kuisioner');
        Route::resource('template', TemplateController::class)->names('template');
        Route::resource('message', MessageController::class)->names('message');
        Route::resource('ECDokumen', ECDocumentController::class)->names('ec');
    });

    // Routes with 'permission:update-profile'
    Route::middleware(['permission:update-profile'])->group(function () {
        Route::get('profile/edit/{profil}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('profile/update/{profil}', [ProfileController::class, 'update'])->name('profile.update');
    });

    // Routes that do not require additional permissions
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::resource('ajuan', AdminController::class)->names('pengajuan');
    Route::get('/ajuan/{id}/assign', [AdminController::class, 'assign'])->name('pengajuan.assign');

    Route::resource('ECDokumen', ECDocumentController::class)->names('ec');
    Route::resource('template', TemplateController::class)->names('template');

    Route::resource('user/request', UserController::class)->names('user.request');
    Route::get('user/make-user/{user}', [UserController::class, 'makeUser'])->name('makeUser');
    Route::get('user/make-reviewer/{user}', [UserController::class, 'makeReviewer'])->name('makeReviewer');

    Route::get('/sekertarisList', [UserController::class , 'Sekertaris'])->name('sekertarisList');
    Route::get('/sekertarisList/create', [UserController::class, 'createSekertaris'])->name('sekertaris.create');
    Route::post('/sekertarisList', [UserController::class, 'regSekertaris'])->name('sekertaris.store');

    Route::get('/message', [MessageController::class, 'index'])->name('message.index');

});

Route::middleware(['auth', 'verified', 'role:reviewer'])->name('reviewer.')->prefix('reviewer')->group(function(){
    Route::resource('pengajuan', ReviewerController::class)->names('pengajuan');
    Route::resource('dokumen/review' , DocRevController::class)->names('dokRev');
    Route::resource('message', MessageController::class)->names('message');
});

Route::middleware(['auth', 'verified', 'role:super_admin'])->name('superadmin.')->prefix('Administrator')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });
});

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
});

Route::middleware(['auth', 'verified', 'role:kppm'])->name('kppm.')->prefix('kppm')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });
});


// Test Route
Route::get('/chat', function () {
    return view('pages.pesan.index');
});

Route::get('/message-show', function () {
    return view('pages.pesan.show');
})->name('message-show');

require __DIR__.'/auth.php';
