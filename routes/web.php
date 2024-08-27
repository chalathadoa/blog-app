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
// CRUD akun
Route::get('/akun', [AkunController::class, 'index'])->name('akun');
Route::get('/add-user', [AkunController::class, 'add_user'])->name('add-user');
Route::post('/save-user', [AkunController::class, 'store'])->name('store');
Route::get('/akun/edit/{username}', [AkunController::class, 'edit_user'])->name('akun.edit');
Route::post('/akun/update/{username}', [AkunController::class, 'update'])->name('akun.update');
Route::delete('/akun/delete/{username}', [AkunController::class, 'destroy'])->name('akun.delete');

// CRUD post
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{idpost}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{idpost}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{idpost}', [PostController::class, 'destroy'])->name('post.delete');
