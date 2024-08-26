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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/post', [PostController::class, 'index'])->middleware('auth')->name('post');
Route::post('/post', [PostController::class, 'savePost'])->middleware('auth');
Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::post('/akun', [AkunController::class, 'saveUser'])->middleware('auth');
