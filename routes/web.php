<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ECDocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\SekretariatController;
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
Route::get('/tes', [LogController::class, 'indexx']);
// Route::post('/tes/post', [LogController::class, 'indexx'])->name('posttt');


Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified', 'role:user'])->name('user.')->group(function(){
    // Route::get('ajuan/upload', [DocumentController::class, 'create'])->name('ajuan.upload');
    // Route::post('ajuan/save', [DocumentController::class, 'store'])->name('ajuan.save');
    // Route::post('ajuan/delete/{ajuan}', [SekretariatController::class, 'destroy'])->name('ajuan.delete');
    // Route::get('ajuan/{ajuan}/detail', [DocumentController::class, 'detail'])->name('ajuan.detail');
    // Route::get('ajuan', [DocumentController::class, 'index'])->name('ajuan.index');

    Route::resource('ajuan', DocumentController::class)->names('ajuan');
    Route::resource('kuisioner', KuisionerController::class)->names('kuisioner');
    Route::get('/template' , [DocumentController::class, 'template'])->name('template');


    Route::get('/message', [MessageController::class, 'index'])->name('message');

    Route::get('profile/edit/{profil}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update/{profil}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::middleware(['auth', 'verified', 'role:sekretariat'])->name('sekretariat.')->prefix('sekretariat')->group(function(){

    Route::resource('ajuan', SekretariatController::class)->names('pengajuan');

    // Route::get('/pengajuan', [SekretariatController::class, 'index'])->name('pengajuan.index');
    // Route::get('/pengajuan/{id}', [SekretariatController::class, 'detail'])->name('pengajuan.show');
    Route::get('/ajuan/{id}/expedited', [SekretariatController::class, 'expedited'])->name('pengajuan.expedited');
    Route::get('/ajuan/{id}/extempted', [SekretariatController::class, 'extempted'])->name('pengajuan.extempted');
    Route::get('/ajuan/{id}/all', [SekretariatController::class, 'all'])->name('pengajuan.all');
    // Route::post('/pengajuan/{id}', [SekretariatController::class, 'post'])->name('pengajuan.post');
    // Route::post('/pengajuan', [SekretariatController::class, 'store'])->name('pengajuan.store');

    Route::get('/uploadEC/{id}', [SekretariatController::class, 'upload'])->name('upload.ec');

    Route::post('/ECDokumen/{id}', [ECDocumentController::class, 'store'])->name('ec.store');
    Route::get('/ECDokumen', [ECDocumentController::class, 'index'])->name('ec.index');

    Route::get('/reviewerList', [UserController::class, 'index'])->name('review.index');
    Route::get('/reviewerList/{id}/edit', [UserController::class, 'edit'])->name('review.edit');
    Route::put('/reviewerList/{id}', [UserController::class, 'update'])->name('review.update');
    // Route::get('/reviewerList/create', [UserController::class, 'create'])->name('review.create');
    // Route::post('/reviewerList', [UserController::class, 'store'])->name('review.store');
    Route::delete('/reviewerList/{id}', [UserController::class, 'destroy'])->name('review.destroy');

    Route::get('/message', [MessageController::class, 'index'])->name('message.index');

});

Route::middleware(['auth', 'verified', 'role:reviewer'])->name('reviewer.')->prefix('reviewer')->group(function(){
    Route::get('/pengajuan', [ReviewerController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/{id}/detail', [ReviewerController::class, 'show'])->name('pengajuan.show');
});

Route::middleware(['auth', 'verified', 'role:super_admin'])->name('super_admin.')->prefix('super_admin')->group(function(){
    Route::get('/tes', function () {
        return 'tes';
    });
});

require __DIR__.'/auth.php';
