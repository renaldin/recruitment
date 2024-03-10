<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use App\Http\Controllers\Question;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\NoteDataTable;

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

Route::group(['middleware' => 'revalidate'], function () {
    
    Route::get('/', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'loginProcess']);
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    Route::get('/lupa-password', [Login::class, 'forgotPassword']);
    Route::post('/lupa-password', [Login::class, 'forgotPassword']);
    Route::get('/reset-password/{id}', [Login::class, 'resetPassword']);
    Route::post('/reset-password/{id}', [Login::class, 'resetPassword']);

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/profil', [User::class, 'profil'])->name('profil');
    Route::post('/profil/{id}', [User::class, 'profil']);
    Route::get('/ubah-password', [User::class, 'changePassword'])->name('ubah-password');
    Route::post('/ubah-password/{id}', [User::class, 'changePassword']);
    
    Route::get('/pengguna', [User::class, 'index'])->name('pengguna');
    Route::get('/detail-pengguna/{id}', [User::class, 'detail'])->name('detail-pengguna');
    Route::get('/tambah-pengguna', [User::class, 'new'])->name('tambah-pengguna');
    Route::post('/tambah-pengguna', [User::class, 'new']);
    Route::get('/edit-pengguna/{id}', [User::class, 'update'])->name('edit-pengguna');
    Route::post('/edit-pengguna/{id}', [User::class, 'update']);
    Route::get('/hapus-pengguna/{id}', [User::class, 'delete']);

    Route::get('/bank-soal', [Question::class, 'index'])->name('bank-soal');
    Route::get('/detail-bank-soal/{id}', [Question::class, 'detail'])->name('detail-bank-soal');
    Route::get('/tambah-bank-soal', [Question::class, 'new'])->name('tambah-bank-soal');
    Route::post('/tambah-bank-soal', [Question::class, 'new']);
    Route::get('/edit-bank-soal/{id}', [Question::class, 'update'])->name('edit-bank-soal');
    Route::post('/edit-bank-soal/{id}', [Question::class, 'update']);
    Route::get('/hapus-bank-soal/{id}', [Question::class, 'delete']);
    
    Route::group(['middleware' => 'hrd'], function () {
        
    });

    Route::group(['middleware' => 'manager'], function () {
        
    });

    Route::group(['middleware' => 'pelamar'], function () {

    });
    
});
