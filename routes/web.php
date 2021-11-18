<?php

use App\Http\Controllers\Admin\CientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PaketWoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\PaketUndanganController;
use App\Http\Controllers\User\PaketUndanganController as UserPaketUndangan;
use App\Http\Controllers\Admin\LayananVendorController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\User\UserCustomControler;
use App\Http\Controllers\User\UserPaketWoControler;


use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendortableController;
use App\Http\Controllers\VendorUserController;
use App\Models\Riwayat;
use App\Models\Transaksi;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','verified'])->name('dashboard');


Route::get('/logout', [DashboardController::class , 'perform']);
require __DIR__.'/auth.php';

// pembatasan admin
Route::get('/dashboard', [DashboardController::class, 'redirect']);
// Route::get('/dashboards', [DashboardController::class, 'index']);

// Ceo
Route::middleware(['auth','Ceo'])->group(function () {
    Route::get('/dashboard/log', [LogController::class, 'index']);
    // Route::get('/dashboard/log/{id}', [LogController::class, 'index']);
});

// Finance
Route::middleware(['auth','Finance'])->group(function () {
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index']);
    Route::get('/dashboard/transaksi/proses/{id}', [TransaksiController::class, 'proses']);
    Route::get('/dashboard/transaksi/{id}', [TransaksiController::class, 'show']);
    Route::put('/dashboard/transaksi/{id}/{trid}/edit', [TransaksiController::class, 'update']);
    Route::get('/dashboard/finance', [TransaksiController::class, 'finance']);
    Route::get('/dashboard/finance/{id}', [TransaksiController::class, 'pdf']);
    Route::get('/dashboard/finance/{id}/export', [TransaksiController::class, 'export']);
});

// Client management
Route::middleware(['auth','Clientmanagent'])->group(function () {
    Route::get('/dashboard/client-tabel', [CientController::class, 'index']);
    Route::get('/dashboard/client-tabel/{id}', [CientController::class, 'show']);



    Route::get('/dashboard/pesanan', [PesananController::class, 'index']);
    Route::put('/dashboard/pesanan/{id}', [PesananController::class, 'update']);
    Route::get('/dashboard/proses/pesanan', [PesananController::class, 'proses']);
    Route::put('/dashboard/proses/pesanan/{id}', [PesananController::class, 'update2']);
    Route::put('/dashboard/selesai/pesanan/{id}', [PesananController::class, 'update3']);
    Route::put('/dashboard/tidak/pesanan/{id}', [PesananController::class, 'update4']);
    Route::get('/dashboard/selesai/pesanan', [PesananController::class, 'selesai']);


    Route::get('/dashboard/paket-undangan', [PaketUndanganController::class, 'index']);
    Route::get('/dashboard/paket-undangan/create', [PaketUndanganController::class, 'create']);
    Route::post('/dashboard/paket-undangan', [PaketUndanganController::class, 'store']);
    Route::get('/dashboard/paket-undangan/{id}', [PaketUndanganController::class, 'show']);
    Route::get('/dashboard/paket-undangan/{id}/edit', [PaketUndanganController::class, 'edit']);
    Route::put('/dashboard/paket-undangan/{id}', [PaketUndanganController::class, 'update']);
    Route::delete('/dashboard/paket-undangan/{id}', [PaketUndanganController::class , 'destroy']);

    Route::get('/dashboard/user', [UserController::class, 'index']);
    Route::get('/dashboard/user/{id}', [UserController::class , 'show']);
    Route::get('/dashboard/user/{id}/edit', [UserController::class , 'edit']);
    Route::put('/dashboard/user/{id}', [UserController::class , 'update']);
    Route::delete('/dashboard/user/{id}', [UserController::class , 'destroy']);
});

// Vendor Management
Route::middleware(['auth','Vendormanagent'])->group(function () {

    Route::get('/dashboard/vendor-tabel', [VendortableController::class, 'index']);
    Route::get('/dashboard/vendor-tabel/cetak', [VendortableController::class, 'cetak']);
    Route::get('/dashboard/vendor-tabel/{id}', [VendortableController::class, 'show']);

    Route::get('/dashboard/layanan-vendor', [LayananVendorController::class, 'index']);
    Route::get('/dashboard/layanan-vendor/{id}', [LayananVendorController::class, 'show']);
    Route::get('/dashboard/layanan-vendor/{id}/edit', [LayananVendorController::class, 'edit']);
    Route::put('/dashboard/layanan-vendor/{id}', [LayananVendorController::class, 'update']);
    Route::delete('/dashboard/layanan-vendor/{id}', [LayananVendorController::class, 'destroy']);

    Route::get('/dashboard/paket-wo', [PaketWoController::class, 'index']);
    Route::get('/dashboard/paket-wo/create', [PaketWoController::class, 'create']);
    Route::post('/dashboard/paket-wo', [PaketWoController::class, 'store']);
    Route::get('/dashboard/paket-wo/{id}', [PaketWoController::class , 'show']);
    Route::get('/dashboard/paket-wo/{id}/edit', [PaketWoController::class , 'edit']);
    Route::put('/dashboard/paket-wo/{id}', [PaketWoController::class , 'update']);
    Route::delete('/dashboard/paket-wo/{id}', [PaketWoController::class , 'destroy']);
});

    // All Tidak usah Login
    Route::get('/', [UserPaketWoControler::class, 'indexview']);
    Route::get('/delete', [DeleteController::class, 'index']);
    Route::get('/paket-undangan', [UserPaketUndangan::class, 'index']);
    Route::get('/paket-wo', [UserPaketWoControler::class, 'index']);

    // Login verifikasi
Route::middleware(['auth'])->group(function () {

    Route::get('/pesanan', [PesanController::class, 'index']);
    Route::get('/ketersediaan/cek', [PesanController::class, 'cek']);

    Route::get('/riwayat', [RiwayatController::class, 'index']);

    Route::get('/user/detail/{id}', [VendorUserController::class, 'show']);
    Route::get('/user/detail/{id}/edit', [VendorUserController::class, 'edit']);
    Route::put('/user/detail/{id}', [VendorUserController::class, 'update']);

    Route::get('/paket-undangan/{id}', [UserPaketUndangan::class, 'show']);
    Route::post('/pesan-undangan/{slug}/{id}', [UserPaketUndangan::class, 'pesan']);
    Route::get('/paket-wo/{id}', [UserPaketWoControler::class, 'show']);
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/user/daftar/layanan/vendor/{id}', [VendorUserController::class, 'daftar']);
    Route::put('/user/daftar/layanan/vendor/{id}', [VendorUserController::class, 'daftarstore']);

    Route::post('/pesanan/{id}', [RiwayatController::class, 'store']);
    Route::put('/riwayat/{id}', [RiwayatController::class, 'update']);

    Route::get('/pesan/{slug}/{id}', [PesanController::class, 'store']);
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy']);

    Route::delete('/hapus-paket-wo/{id}', [LayananVendorController::class, 'destroy']);
    Route::get('/paket-custom', [UserCustomControler::class, 'index']);
    Route::get('/paket-custom/create/nama_awal', [UserCustomControler::class, 'namaawal']);
    Route::get('/paket-custom/create', [UserCustomControler::class, 'create']);
    Route::get('/paket-custom/create/{id}/{idwo}', [UserCustomControler::class, 'creates']);
    Route::get('/custom/create-step-2/{idwo}', [UserCustomControler::class, 'step2']);
    Route::get('/custom/create-step-2/{id}/{idwo}', [UserCustomControler::class, 'steps2']);
    Route::get('/custom/create-step-3/{idwo}', [UserCustomControler::class, 'step3']);
    Route::get('/custom/create-step-3/{id}/{idwo}', [UserCustomControler::class, 'steps3']);
    Route::get('/custom/create-step-4/{idwo}', [UserCustomControler::class, 'step4']);
    Route::get('/custom/create-step-4/{id}/{idwo}', [UserCustomControler::class, 'steps4']);
    Route::get('/custom/create-step-5/{idwo}', [UserCustomControler::class, 'step5']);
    Route::get('/custom/create-step-5/{id}/{idwo}', [UserCustomControler::class, 'steps5']);
    Route::get('/custom/create-step-6/{idwo}', [UserCustomControler::class, 'step6']);
    Route::get('/custom/create-step-6/{id}/{idwo}', [UserCustomControler::class, 'steps6']);
    Route::get('/custom/create-step-7/{idwo}', [UserCustomControler::class, 'step7']);
    Route::get('/custom/create-step-7/{id}/{idwo}', [UserCustomControler::class, 'steps7']);
    Route::get('/custom/create-nama/{idwo}', [UserCustomControler::class, 'nama']);
    Route::get('/custom/{slug}/{idwo}/{id}', [UserCustomControler::class, 'slugedit']);
    Route::put('/custom/create-nama/{idwo}', [UserCustomControler::class, 'namas']);

    Route::get('/vendors', [VendorController::class, 'index'])->middleware(['auth']);
    Route::get('/vendor/create', [VendorController::class, 'create'])->middleware(['auth']);
    Route::post('/vendors', [VendorController::class, 'store']);
    Route::get('/vendor/{id}', [VendorController::class, 'show']);
    Route::get('/vendor/{id}/edit', [VendorController::class, 'edit']);
    Route::put('/vendor/{id}', [VendorController::class, 'update']);
    Route::delete('/vendor/{id}', [VendorController::class, 'destroy']);
    Route::get('/vendors/cetak/{id}', [VendorController::class, 'cetak']);
});


