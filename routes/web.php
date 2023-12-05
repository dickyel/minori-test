<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTrainingPegawaiController;
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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard-admin');

Route::resource('pegawai-admin','App\Http\Controllers\Admin\AdminPegawaiController');

Route::resource('training-admin','App\Http\Controllers\Admin\AdminTrainingController');

Route::get('/training-create',[AdminTrainingPegawaiController::class,'create'])->name('create-pegawai-training');

Route::post('/admin-training/store', [AdminTrainingPegawaiController::class, 'store'])->name('store-pegawai-training'); 

Route::get('/data-karyawan', [AdminTrainingPegawaiController::class, 'datakaryawan'])->name('data-karyawan-index');

Route::get('/data-karyawan/edit/{id}', [AdminTrainingPegawaiController::class, 'edit_data_karyawan'])->name('data-karyawan-edit');

Route::put('/data-karyawan/update/{id}', [AdminTrainingPegawaiController::class, 'update_data_karyawan'])->name('data-karyawan-update');

Route::delete('/data-karyawan/{id}', [AdminTrainingPegawaiController::class, 'destroy_data_karyawan'])->name('data-karyawan-destroy');

Route::get('/data-training', [AdminTrainingPegawaiController::class, 'datatraining'])->name('data-training-index'); 


