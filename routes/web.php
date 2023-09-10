<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\UserController;
use App\Models\Sampah;
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
    return view('home')->with([
        'datas' => Sampah::all()
    ]);
});

Route::post('/hitung', [SampahController::class, 'hitung']);

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'login')->name('login');

    Route::controller(UserController::class)->group(function () {
        Route::post('/checklogin', 'login');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/logout', 'logout');
    });
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show');
        Route::post('/store-sampah', 'storeSampah');
        Route::post('/delete-sampah/{id}', 'destroy');
        Route::put('/update-sampah/{id}', 'edit');
    });
});
