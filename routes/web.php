<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    return view('landing');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/admin_login', [AuthController::class, 'admin_login'])->name('login');
Route::post('/proses', [AuthController::class, 'proses'])->name('proses');
Route::post('/do_login', [AuthController::class, 'do_login'])->name('do_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeradd', [AuthController::class, 'registeradd'])->name('registeradd');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/lock', [AuthController::class, 'lock'])->name('lock');

Route::middleware(['auth', 'akses:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/jumlah', [AdminController::class, 'jumlah'])->name('jumlah');
    Route::get('/admin/formulir', [AdminController::class, 'formulir'])->name('formulir');
    Route::post('/admin/store_form', [AdminController::class, 'store_form'])->name('store_form');
    Route::get('/admin/residu', [AdminController::class, 'residu'])->name('residu');
    Route::get('/admin/valid', [AdminController::class, 'valid'])->name('valid');
    Route::get('/admin/invalid', [AdminController::class, 'invalid'])->name('invalid');
    Route::get('/admin/manage', [AdminController::class, 'manage'])->name('manage');
    Route::post('/admin/tambah_user', [AdminController::class, 'tambah_user'])->name('tambah_user');
    Route::post('/admin/update_user/{id}', [AdminController::class, 'update_user'])->name('update_user');
    Route::get('/admin/del_user/{id}', [AdminController::class, 'del_user'])->name('del_user');
    Route::get('/admin/instansi', [AdminController::class, 'instansi'])->name('instansi');
    Route::post('/admin/add_instansi', [AdminController::class, 'add_instansi'])->name('add_instansi');
    Route::post('/admin/upd_instansi/{id}', [AdminController::class, 'upd_instansi'])->name('upd_instansi');
    Route::post('/admin/import_instansi', [AdminController::class, 'import_instansi'])->name('import_instansi');
    Route::get('/admin/del_instansi/{id}', [AdminController::class, 'del_instansi'])->name('del_instansi');
    Route::get('/admin/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/admin/upd_setting/{id}', [AdminController::class, 'upd_setting'])->name('upd_setting');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});
