<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LayananController;
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


    // kelola arsip
    Route::get('/arsip', [PeriodeController::class, 'index'])->name('arsip.index');
    // kelola warga
    Route::get('/warga', [PeriodeController::class, 'index'])->name('warga.index');

    // user management
    Route::get('/user/{jenis}', [UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user/hapus', [UserManagementController::class, 'hapus'])->name('user.hapus');
    Route::post('/user/resetpw', [UserManagementController::class, 'resetpw'])->name('user.resetpw');
    Route::post('/user/status', [UserManagementController::class, 'status'])->name('user.status');

    // kelola periode
    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
    Route::post('/periode/store', [PeriodeController::class, 'store'])->name('periode.store');
    Route::POST('/periode/hapus/', [PeriodeController::class, 'hapus'])->name('periode.hapus');
    Route::get('/getPeriodeById/{id}', [PeriodeController::class, 'getPeriodeById'])->name('getPeriodeById');


    // kelola prodi
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
    Route::POST('/prodi/hapus/', [ProdiController::class, 'hapus'])->name('prodi.hapus');

    //kelola pengajuan magang
    Route::get('pengajuan-magang/detail/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang.detail');
    Route::post('pengajuan-magang/proses', [PengajuanMagangController::class, 'proses'])->name('pengajuanMagang.proses');
    Route::get('/GetDosenRekomendasi/{id}', [PengajuanMagangController::class, 'getDosenRekomendasi'])->name('GetDosenRekomendasi');
    Route::get('/GetJumlahBimbingan/{id}', [PengajuanMagangController::class, 'getJumlahBimbingan'])->name('GetJumlahBimbingan');

    // kelola sekolah
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::post('/sekolah/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::POST('/sekolah/hapus/', [SekolahController::class, 'hapus'])->name('sekolah.hapus');
});

Route::group(['middleware' => ['role:mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/tambah', [PengajuanMagangController::class, 'tambah'])->name('pengajuanMagang.tambah');
    Route::post('pengajuan-magang/store', [PengajuanMagangController::class, 'store'])->name('pengajuanMagang.store');
    Route::post('pengajuan-magang/upload', [PengajuanMagangController::class, 'uploadLaporan'])->name('pengajuanMagang.upload');
    Route::get('/pengajuan-magang/edit/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang/edit');
    // Route::POST('/pengajuan-magang/hapus/', [PengajuanMagangController::class, 'hapus'])->name('pengajuanMagang.hapus');

    // kuisioner
    Route::post('isi-kuisioner/store', [KuisionerController::class, 'store'])->name('kuisioner.store');

    //kelola lookbook
    Route::get('/lookbook/{id}', [LookBookController::class, 'index'])->name('lookbook');
    Route::post('lookbook/store', [LookBookController::class, 'store'])->name('lookbook.store');
    Route::POST('/lookbook/hapus/', [LookBookController::class, 'hapus'])->name('lookbook.hapus');
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
    Route::post('/kurang_mampu', [BedaNamaController::class, 'store'])->name('kurang_mampu.store');


   
});

Route::group(['middleware' => ['role:warga|admin']], function () {
   // detail pengajuan
    Route::get('pengajuan/detail/{id}', [PengajuanController::class, 'detail'])->name('pengajuan/detail/');
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
});
