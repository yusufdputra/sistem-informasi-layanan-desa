<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\LookBookController;
use App\Http\Controllers\MahasiswaBimbingan;
use App\Http\Controllers\Warga\PengajuanController;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SaveSignatureController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Surat\BedaNamaController;
use App\Http\Controllers\Surat\DomisiliController;
use App\Http\Controllers\Surat\KurangMampuController;
use App\Http\Controllers\Surat\PenghasilanController;
use App\Http\Controllers\Surat\UsahaController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WargaController;
use App\Models\Layanan;
use App\Models\Lookbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'auth'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Auth::routes();

Route::post('/register/', [RegisterController::class, 'create'])->name('register.create');

// admin

Route::group(['middleware' => ['role:admin']], function () {
    // kelola berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/add', [BeritaController::class, 'add'])->name('berita.add');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita/edit/');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::post('/berita/hapus', [BeritaController::class, 'hapus'])->name('berita.hapus');
    // kelola staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::post('/staff/hapus', [StaffController::class, 'hapus'])->name('staff.hapus');
    // kelola lembaga
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
    Route::post('/lembaga/store', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::post('/lembaga/hapus', [LembagaController::class, 'hapus'])->name('lembaga.hapus');

    // kelola layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
    Route::post('/layanan/hapus', [LayananController::class, 'hapus'])->name('layanan.hapus');

    //kelola pengajuan
    Route::get('/pengajuan/terima/{id}', [PengajuanController::class, 'terima'])->name('pengajuan/terima/');
    Route::post('/pengajuan.tolak', [PengajuanController::class, 'tolak'])->name('pengajuan.tolak');
    Route::post('/pengajuan.hapus', [PengajuanController::class, 'hapus'])->name('pengajuan.hapus');
    // kurang mampu
    Route::post('/kurang_mampu.update', [BedaNamaController::class, 'store'])->name('kurang_mampu.update');



    // kelola warga
    Route::get('/warga', [WargaController::class, 'dataWarga'])->name('warga');

    // user management
    Route::get('/user/{jenis}', [UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user/hapus', [UserManagementController::class, 'hapus'])->name('user.hapus');
    Route::post('/user/resetpw', [UserManagementController::class, 'resetpw'])->name('user.resetpw');
    Route::post('/user/status', [UserManagementController::class, 'status'])->name('user.status');

    
});



Route::group(['middleware' => ['role:warga']], function () {

    // kelola pengajuan
    Route::post('/pengajuan/add', [PengajuanController::class, 'add'])->name('pengajuan.add');
    Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::post('/pengajuan/hapus', [PengajuanController::class, 'hapus'])->name('pengajuan.hapus');

    // pengajuan surat
    // surat beda nama
    Route::post('/beda_nama', [BedaNamaController::class, 'store'])->name('beda_nama.store');
    // kurang mampu
    Route::post('/kurang_mampu', [KurangMampuController::class, 'store'])->name('kurang_mampu.store');
    // penghasilan
    Route::post('/penghasilan', [PenghasilanController::class, 'store'])->name('penghasilan.store');
    // domisili
    Route::post('/domisili', [DomisiliController::class, 'store'])->name('domisili.store');
    // usaha
    Route::post('/usaha', [UsahaController::class, 'store'])->name('usaha.store');
});

Route::group(['middleware' => ['role:warga|admin']], function () {
    // detail pengajuan
    Route::get('pengajuan/detail/{id}', [PengajuanController::class, 'detail'])->name('pengajuan/detail/');

    
});
Route::group(['middleware' => ['role:kades|admin']], function () {
    // kelola arsip
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
});

Route::group(['middleware' => ['role:warga|admin|kades']], function () {
    // kelola pengajuan
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');

    // kelola profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile/upFotoProfil', [ProfileController::class, 'updateFotoProfil'])->name('profile.upFotoProfil');
    // upload signature
    Route::post('/upSignature', [SaveSignatureController::class, 'store'])->name('profile.upSignature');

    //kelola kata sandi
    Route::post('/katasandi.reset', [ResetPasswordController::class, 'reset'])->name('katasandi.reset');

    // cetak pengajuan
    Route::get('cetak/{id}', [CetakController::class, 'cetak'])->name('cetak/');
});
