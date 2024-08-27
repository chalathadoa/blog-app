<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AkunController;
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

Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'save_post']);
Route::get('/akun', [AkunController::class, 'index'])->name('akun');
Route::get('/add-user', [AkunController::class, 'add_user'])->name('add-user');
Route::post('/save-user', [AkunController::class, 'store'])->name('store');
Route::get('/akun/edit/{username}', [AkunController::class, 'edit_user'])->name('akun.edit');
Route::post('/akun/update/{username}', [AkunController::class, 'update'])->name('akun.update');
Route::delete('/akun/delete/{username}', [AkunController::class, 'destroy'])->name('akun.delete');
