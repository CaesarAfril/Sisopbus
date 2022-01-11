<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\KruController;

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

//Route Login
Route::get('/', [AuthController::class, 'index']);

Route::get('/admin', [AuthController::class, 'logadm']);

Route::post('/ceklogin', [AuthController::class, 'cekLogin']);

Route::get('/dashboard', [AuthController::class, 'home']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/laporan', [KruController::class, 'lapor']);
//Route Kru
Route::group(['middleware' => ['kru']], function () {
    

    Route::get('/perjalanan', [KruController::class, 'hisper']);

    Route::get('/perawatan', [KruController::class, 'hispera']);

    Route::get('/laporjalan', [KruController::class, 'operasi']);

    Route::post('/pilihlapor', [KruController::class, 'pilih']);

    Route::post('/insertjalan', [KruController::class, 'insertjalan']);

    Route::post('/endjalan', [KruController::class, 'checkout']);

    Route::post('/endrawat', [KruController::class, 'endperawatan']);

    Route::get('/insertperawatan', [KruController::class, 'insertrawat']);
});

//Route Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/operasional', [AdmController::class, 'laporan']);

    Route::get('/daftarbus', [AdmController::class, 'dabus']);

    Route::get('/rute', [AdmController::class, 'rute']);

    Route::get('/daftaradmin',[AdmController::class, 'damin']);

    Route::get('/profiladmin',[AdmController::class, 'profil']);

    Route::post('/updateprofil',[AdmController::class, 'update']);

    Route::get('/hapus_akun/{id}',[AdmController::class, 'hapusakun']);

    Route::get('/tambahchassis',[AdmController::class, 'sasis']);

    Route::get('/datachassis', [AdmController::class, 'datasasis']);

    Route::post('/insertchassis', [AdmController::class, 'insertsasis']);

    Route::get('/tambahbus', [AdmController::class, 'tambahbus']);

    Route::post('/insertbus', [AdmController::class, 'insertbus']);

    Route::get('/sasis/{id}', [AdmController::class, 'get_sasis']);

    Route::get('/databis/{id}', [AdmController::class, 'databis']);

    Route::get('/tambahadmin', [AdmController::class, 'tambahadmin']);

    Route::post('/insertprofil', [AdmController::class, 'insertadmin']);

    Route::get('/tambahrute', [AdmController::class, 'tambahrute']);

    Route::post('/insertrute', [AdmController::class, 'insertrute']);

    Route::get('/edit_bus/{id}', [AdmController::class, 'editbus']);

    Route::post('/updatebus', [AdmController::class, 'updatebus']);

    Route::post('/laporanoperasional-admin', [AdmController::class, 'cetakoperasional']);

    Route::post('/laporanperawatan-admin', [AdmController::class, 'cetakperawatan']);

    Route::post('/laporanperjalanan-admin', [AdmController::class, 'cetakperjalanan']);

    Route::get('/hapus_bus/{id}', [AdmController::class, 'hapusbus']);

    Route::get('/editrute/{id}', [AdmController::class, 'editrute']);
});
