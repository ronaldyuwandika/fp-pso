<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterContoller;
use App\Http\Controllers\User\HomeController;

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

//! Login Register START
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');
Route::get('/register', [RegisterContoller::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterContoller::class, 'store'])->name('register.store')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
//! Login Register END

//! Home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'user']);
Route::get('/parkir', [HomeController::class, 'parkir'])->name('parkir')->middleware(['auth', 'user']);
Route::get('/parkir/{id}', [HomeController::class, 'parkirDetail'])->name('parkir.detail')->middleware(['auth', 'user']);
Route::post('/parkir', [HomeController::class, 'parkirStore'])->name('parkir.detail.store')->middleware(['auth', 'user']);
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware(['auth', 'user']);
Route::put('/profile', [HomeController::class, 'profileUpdate'])->name('profile.update')->middleware(['auth', 'user']);
//! End Home

//! Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware(['auth', 'admin']);
Route::get('/admin/parkir/{id}', [AdminController::class, 'parkirDetail'])->name('admin.parkir.detail')->middleware(['auth', 'admin']);
Route::get('/increment/{id}', [AdminController::class, 'increment'])->name('increment')->middleware(['auth', 'admin']);
Route::get('/decrement/{id}', [AdminController::class, 'decrement'])->name('decrement')->middleware(['auth', 'admin']);
Route::get('/generate/{id}', [AdminController::class, 'generate'])->name('generate')->middleware(['auth', 'admin']);
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile')->middleware(['auth', 'admin']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

