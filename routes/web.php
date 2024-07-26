<?php
use App\Http\Controllers\Authentification;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\dashboardAdmin;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Livewire\Buku;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', KategoriBukuController::class);
Route::resource('penerbit', PenerbitController::class);

// Routes accessible to both admin and users
Route::group(['prefix' => 'account'], function () {
    // Routes for guests (unauthenticated users)
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [Authentification::class, 'index'])->name('account.login');
        Route::get('landingpage', [LandingPageController::class, 'index']);
        Route::get('register', [Authentification::class, 'register'])->name('account.register');
        Route::post('process-register', [Authentification::class, 'ProcessRegister'])->name('account.ProcessRegister');
        Route::post('authenticate', [Authentification::class, 'authenticate'])->name('account.authenticate');
    });

    // Routes for authenticated users (both admin and regular users)
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [Authentification::class, 'logout'])->name('account.logout');
        Route::resource('dashboard', BukuController::class)->names([
            'index' => 'account.dashboard',
        ]);
        Route::get('book/{id}', [BukuController::class, 'show'])->name('account.show');
        Route::get('pinjam-buku', [PeminjamanController::class, 'index'])->name('pinjam-buku');
        Route::get('pinjam-buku/{id}', [PeminjamanController::class, 'store'])->name('account.peminjaman');
        Route::get('pinjam-buku/disetujui/{id}', [PeminjamanController::class, 'accept'])->name('pinjam-buku.disetujui');
        Route::get('pinjam-buku/tolak/{id}', [PeminjamanController::class, 'remove'])->name('pinjam-buku.tolak');

        //pengembalian
        Route::get('pengembalian-buku', [PengembalianController::class, 'index'])->name('pengembalian-buku');
        Route::get('pengembalian-buku/{id}', [PengembalianController::class, 'pengembalian'])->name('pengembalian-buku-baru');



        Route::resource('tampilan', dashboardAdmin::class)->names([
            'index' => 'admin.tampilan',
            'create' => 'tampilan.create',
            'store' => 'tampilan.store',
            'show' => 'tampilan.show',
            'edit' => 'tampilan.edit',
            'update' => 'tampilan.update',
            'destroy' => 'tampilan.delete',
        ]);
        Route::put('book/{id}', [dashboardAdmin::class, 'update'])->name('book.update');
        // Route::post('book-rent', [BookRentController::class, 'index'])->name('admin.book-rent');
    });
});
Route::get('/buku/{id}', Buku::class);
