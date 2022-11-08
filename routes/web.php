<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\PilihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth');
Route::post('/login', [UserDashboardController::class, 'login']);
Route::post('/logout', [UserDashboardController::class, 'logout'])->middleware('auth');
Route::post('/dashboard', [UserDashboardController::class, 'vote'])->middleware('auth');
Route::get('/pil', [UserDashboardController::class, 'pil'])->middleware('auth');

Route::get('/dashboard/profil/{id}', [UserDashboardController::class, 'profil']);


Route::get('/admin/dashboard', function () {
    return view('dashboard.menu.index');
})->middleware('auth');
Route::get('/admin/laporan', [PilihanController::class, 'index'])->middleware('auth');
Route::resource('/admin/kandidat', KandidatController::class)->middleware('auth');
Route::resource('/admin/user', UserController::class)->middleware('auth');