<?php

use App\Http\Controllers\AdminController;
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
})->name('login');

Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth');
Route::post('/login', [UserDashboardController::class, 'login']);
Route::get('/register', [UserDashboardController::class, 'register']);
Route::post('/register', [UserDashboardController::class, 'storeRegister']);
Route::get('/logout', [UserDashboardController::class, 'logout'])->middleware('auth');
Route::post('/dashboard', [UserDashboardController::class, 'vote'])->middleware('auth');
Route::get('/pil', [UserDashboardController::class, 'pil'])->middleware('auth');

Route::get('/dashboard/profil/{id}', [UserDashboardController::class, 'profil']);


// Route::get('/admin/dashboard', function () {
//     return view('dashboard.menu.index');
// })->middleware('auth');
// Route::get('/admin/laporan', [PilihanController::class, 'index'])->middleware('auth');
// Route::resource('/admin/kandidat', KandidatController::class)->middleware('auth');
// Route::resource('/admin/user', UserController::class)->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('dashboard.menu.login');
    })->name('admin.login');
    Route::post('/login', [AdminController::class, 'adminLogin']);
    Route::get('/logout', [UserDashboardController::class, 'adminLogout']);
    Route::middleware('admin')->group((function (){
        Route::get('/dashboard', function () {
            return view('dashboard.menu.index');
        });
        Route::get('/laporan', [PilihanController::class, 'index']);
        Route::resource('/kandidat', KandidatController::class);
        Route::resource('/user', AdminController::class);
        Route::get('/user/{id}/aktivasi', [AdminController::class, 'aktivasi']);
    }));
});