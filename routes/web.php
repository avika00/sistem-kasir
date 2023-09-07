<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


Route::POST('/login', [LoginController::class, 'authenticate']);
Route::group(['middleware' => ['auth']], function(){
    
    //CRUD Data User
    Route::GET('/', [HomeController::class, 'index']);
    Route::GET('/user', [UserController::class, 'index']);
    Route::POST('/user/store', [UserController::class, 'store']);
    Route::POST('/user/update/{id}', [UserController::class, 'update']);
    Route::GET('/user/destroy/{id}', [UserController::class, 'destroy']);

    //CRUD Data Jenis Barang
    Route::GET('/', [HomeController::class, 'index']);
    Route::GET('/jenisbarang', [JenisBarangController::class, 'index']);
    Route::POST('/jenisbarang/store', [JenisBarangController::class, 'store']);
    Route::POST('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
    Route::GET('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy']);

    //CRUD Data Barang
    Route::GET('/', [HomeController::class, 'index']);
    Route::GET('/barang', [BarangController::class, 'index']);
    Route::POST('/barang/store', [BarangController::class, 'store']);
    Route::POST('/barang/update/{id}', [BarangController::class, 'update']);
    Route::GET('/barang/destroy/{id}', [BarangController::class, 'destroy']);


});