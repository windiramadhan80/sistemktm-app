<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('mahasiswa/{id}', [HomeController::class, 'show']);
Route::get('/tutorial', [HomeController::class, 'tutorial']);
Route::get('/pendaftaran', [HomeController::class, 'pendaftaran']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('profile/{id}', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('edit/{id}', [DashboardController::class, 'edit'])->middleware('auth');
Route::put('/edit/{id}', [DashboardController::class, 'update'])->middleware('auth');
