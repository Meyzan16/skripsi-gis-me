<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BobotController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataGempaController;
use App\Http\Controllers\Admin\DataTitikController;
use App\Http\Controllers\Admin\KegempaanController;
use App\Http\Controllers\Admin\TestDonovanController;
use App\Http\Controllers\Admin\GeologiFisikController;
use App\Http\Controllers\Admin\StrukturGeologiController;
use App\Http\Controllers\Admin\DataUjiGempaLamaController;
use App\Http\Controllers\Admin\KemiringanLerengController;

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
    return view('User.main.homepage');
});


Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/'], function(){

        Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

        Route::get('/test-danovan', [TestDonovanController::class, 'index'] )->name('test-danovan');

        Route::resource('data-bobot', BobotController::class);
        Route::resource('geologi-fisik', GeologiFisikController::class);
        Route::resource('kemiringan-lereng', KemiringanLerengController::class);
        Route::resource('data-titik', DataTitikController::class);
        Route::resource('data-gempa', DataGempaController::class);
        
        Route::group(['prefix' => 'kegempaan/'], function(){
            Route::get('/', [KegempaanController::class, 'index'])->name('admin.kegempaan.index');
        });

        Route::group(['prefix' => 'struktur-geologi/'], function(){
            Route::get('/', [StrukturGeologiController::class, 'index'])->name('admin.struktur-geologi.index');
        });

        Route::group(['prefix' => 'data-uji' ], function(){
            Route::get('/', [DataUjiGempaLamaController::class, 'index'])->name('admin.dataujilama.index');
            route::POST('/proses-metode', [DataUjiGempaLamaController::class, 'proses_metode'])->name('admin.dataujigempa-lama.proses_metode');
        });
    });

    Route::get('/connexion', [LoginController::Class, 'index'] )->name('connexion');
    Route::post('/connexion', [LoginController::Class, 'authenticate'] )->name('proses_connexion');
    Route::post('/logout-connexion', [LoginController::Class, 'logout'])->name('logout-connexion');