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
use App\Http\Controllers\SekertarisController;
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

Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:user'])->name('user.')->group(function(){

    Route::resource('ajuan', DocumentController::class)->names('ajuan');
    Route::resource('kuisioner', KuisionerController::class)->names('kuisioner');
    Route::get('/template' , [DocumentController::class, 'template'])->name('template');
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::resource('ECDokumen', ECDocumentController::class)->names('ec');

    Route::get('profile/edit/{profil}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update/{profil}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::resource('ajuan', AdminController::class)->names('pengajuan');
    Route::get('/ajuan/{id}/assign', [AdminController::class, 'assign'])->name('pengajuan.assign');

    Route::get('/uploadEC/{id}', [AdminController::class, 'upload'])->name('upload.ec');
    Route::resource('ECDokumen', ECDocumentController::class)->names('ec');

    Route::resource('user/request', UserController::class)->names('user.request');
    Route::get('user/make-user/{user}', [UserController::class, 'makeUser'])->name('makeUser');
    Route::get('user/make-reviewer/{user}', [UserController::class, 'makeReviewer'])->name('makeReviewer');

    Route::get('/reviewerList', [UserController::class, 'rev'])->name('review.index');
    Route::get('/reviewerList/{id}/edit', [UserController::class, 'edit'])->name('review.edit');
    Route::put('/reviewerList/{id}', [UserController::class, 'update'])->name('review.update');
    // Route::get('/reviewerList/create', [UserController::class, 'create'])->name('review.create');
    // Route::post('/reviewerList', [UserController::class, 'store'])->name('review.store');
    Route::delete('/reviewerList/{id}', [UserController::class, 'destroy'])->name('review.destroy');

    Route::get('/sekertarisList', [UserController::class , 'Sekertaris'])->name('sekertarisList');
    Route::get('/sekertarisList/create', [UserController::class, 'createSekertaris'])->name('sekertaris.create');
    Route::post('/sekertarisList', [UserController::class, 'regSekertaris'])->name('sekertaris.store');

    Route::get('/message', [MessageController::class, 'index'])->name('message.index');

});

Route::middleware(['auth', 'verified', 'role:reviewer'])->name('reviewer.')->prefix('reviewer')->group(function(){
    Route::get('/pengajuan', [ReviewerController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/{id}/detail', [ReviewerController::class, 'show'])->name('pengajuan.show');
});

Route::middleware(['auth', 'verified', 'role:super_admin'])->name('superadmin.')->prefix('Administrator')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });
});

Route::middleware(['auth', 'verified', 'role:sekertaris'])->name('sekertaris.')->prefix('sekertaris')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });

    Route::post('/update-password', [SekertarisController::class, 'updatePassword'])->name('update-password');

    Route::post('/ajuan/{id}/expedited', [AdminController::class, 'expedited'])->name('pengajuan.expedited');
    Route::get('/ajuan/{id}/extempted', [AdminController::class, 'extempted'])->name('pengajuan.extempted');
    Route::post('/ajuan/{id}/all', [AdminController::class, 'all'])->name('pengajuan.all');
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
