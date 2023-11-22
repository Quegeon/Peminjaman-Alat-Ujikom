<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;


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

//Login
Route::get('/', [LoginController::class, 'index']);
Route::post('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/logout', [LoginController::class, 'logout']);

//Signup
Route::get('/signup', [SignupController::class, 'index']);
Route::post('/postsignup', [SignupController::class, 'postsignup']);

Route::middleware(['auth'])->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Petugas
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/create', [PetugasController::class, 'create']);
    Route::post('/petugas/store', [PetugasController::class, 'store']);
    Route::get('/petugas/{id}/show', [PetugasController::class, 'show']);
    Route::put('/petugas/{id}/update', [PetugasController::class, 'update']);
    Route::delete('/petugas/{id}/destroy', [PetugasController::class, 'destroy']);
    Route::get('/petugas/{id}/show/password', [PetugasController::class, 'show_password']);
    Route::put('/petugas/{id}/change_password', [PetugasController::class, 'change_password']);
    Route::get('/petugas/profile', [PetugasController::class, 'index_profile']);
    Route::get('/petugas/show/profile', [PetugasController::class, 'show_profile']);
    Route::put('/petugas/change_profile', [PetugasController::class, 'change_profile']);

    //Member
    Route::get('/member', [MemberController::class, 'index']);
    Route::get('/member/create', [MemberController::class, 'create']);
    Route::post('/member/store', [MemberController::class, 'store']);
    Route::get('/member/{id}/show', [MemberController::class, 'show']);
    Route::put('/member/{id}/update', [MemberController::class, 'update']);
    Route::delete('/member/{id}/destroy', [MemberController::class, 'destroy']);
    Route::get('/member/{id}/show/password', [MemberController::class, 'show_password']);
    Route::put('/member/{id}/change_password', [MemberController::class, 'change_password']);
    Route::get('/member/profile', [MemberController::class, 'index_profile']);
    Route::get('/member/show/profile', [MemberController::class, 'show_profile']);
    Route::put('/member/change_profile', [MemberController::class, 'change_profile']);
    Route::get('/member/index_borrow', [MemberController::class, 'index_borrow']);
    Route::get('/member/{id}/create/borrow', [MemberController::class, 'create_borrow']);
    Route::post('/member/borrow', [MemberController::class, 'borrow']);

    //Jenis
    Route::get('/jenis', [JenisController::class, 'index']);
    Route::get('/jenis/create', [JenisController::class, 'create']);
    Route::post('/jenis/store', [JenisController::class, 'store']);
    Route::get('/jenis/{id}/show', [JenisController::class, 'show']);
    Route::put('/jenis/{id}/update', [JenisController::class, 'update']);
    Route::delete('/jenis/{id}/destroy', [JenisController::class, 'destroy']);

    //Alat
    Route::get('/alat', [AlatController::class, 'index']);
    Route::get('/alat/create', [AlatController::class, 'create']);
    Route::post('/alat/store', [AlatController::class, 'store']);
    Route::get('/alat/{id}/show', [AlatController::class, 'show']);
    Route::put('/alat/{id}/update', [AlatController::class, 'update']);
    Route::delete('/alat/{id}/destroy', [AlatController::class, 'destroy']);

    //Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
    Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);
    Route::get('/peminjaman/{id}/show', [PeminjamanController::class, 'show']);
    Route::put('/peminjaman/{id}/update', [PeminjamanController::class, 'update']);
    Route::delete('/peminjaman/{id}/destroy', [PeminjamanController::class, 'destroy']);
    Route::get('/peminjaman/{id}/change_status', [PeminjamanController::class, 'change_status']);
    Route::get('/peminjaman/print', [PeminjamanController::class, 'print']);
    Route::get('/peminjaman/{id}/receipt', [PeminjamanController::class, 'receipt']);

});