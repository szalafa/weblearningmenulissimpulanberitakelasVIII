<?php

use App\Http\Controllers\Admin\AsesmenController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DiskusiController;
use App\Http\Controllers\Admin\HasilAsesmenController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Murid\AsesmenController as MuridAsesmenController;
use App\Http\Controllers\Murid\DashboardController;
use App\Http\Controllers\Murid\DiskusiController as MuridDiskusiController;
use App\Http\Controllers\Murid\MateriController as MuridMateriController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
})->name('landing');

Route::get('/tutorial', function () {
    return view('tutorial');
})->name('tutorial');

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('manajemen')->group(function () {
        Route::group(['prefix' => 'master'], function () {
            // Dashboard
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.admin');

            // Materi Pembelajaran
            Route::resource('/materi', MateriController::class);
            Route::get('/materi-table', [MateriController::class, 'IndexTable'])->name('materi.index-table');
            Route::get('/get-order-materi', [MateriController::class, 'getOrder'])->name('get-order-materi');

            // User
            Route::resource('/user', UserController::class)->middleware('admin');
            Route::get('/user-table', [UserController::class, 'IndexTable'])->name('user.index-table');

            // Asesmen
            Route::resource('/asesmens', AsesmenController::class);
            Route::get('/asesmens-table', [AsesmenController::class, 'IndexTable'])->name('asesmen.index-table');
            Route::get('/get-order-asesmen', [AsesmenController::class, 'getOrder'])->name('get-order-asesmen');

            // Hasil Asesmen
            Route::get('/hasil-asesmen', [HasilAsesmenController::class, 'index'])->name('hasil-asesmen');
            Route::get('/hasil-asesmen-dt', [HasilAsesmenController::class, 'hasilAsesmenDT'])->name('hasil-asesmen.index-table');
            Route::get('/update-status/{id}', [HasilAsesmenController::class, 'updateStatus'])->name('updateStatus');

            // Diskusi
            Route::resource('/diskusi', DiskusiController::class);
        });
    });

    Route::group(['prefix' => 'learning'], function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('learning');

        // Materi
        Route::get('/materi/{id}', [MuridMateriController::class, 'show'])->name('materi.learning');

        // Diskusi
        Route::resource('/diskusi', MuridDiskusiController::class)->except('index');
        Route::get('/diskusi', [MuridDiskusiController::class, 'index'])->name('diskusi.learning');

        // Asesmen
        Route::resource('/asesmen', MuridAsesmenController::class)->except('index');
        Route::get('/asesmen', [MuridAsesmenController::class, 'index'])->name('asesmen.learning');
    });
});

require __DIR__ . '/auth.php';
