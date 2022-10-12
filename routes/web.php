<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BobotController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\TestKemiringanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataGempaController;
use App\Http\Controllers\Admin\DataTitikController;
use App\Http\Controllers\Admin\KegempaanController;
use App\Http\Controllers\Admin\TestDonovanController;
use App\Http\Controllers\Admin\GeologiFisikController;
use App\Http\Controllers\User\UjiDataRealtimeController;
use App\Http\Controllers\User\UserdataujilamaController;


use App\Http\Controllers\Admin\StrukturGeologiController;
use App\Http\Controllers\Admin\DataUjiGempaLamaController;
use App\Http\Controllers\Admin\KemiringanLerengController;
use App\Http\Controllers\Admin\InformasiTipologiController;

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
})->name('homepage');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin/'], function(){
        Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');
        Route::POST('/chartDashboard', [DashboardController::class, 'chartDashboard'] )->name('chartDashboard');

        Route::get('/test-danovan', [TestDonovanController::class, 'index'] )->name('test-danovan');

        Route::resource('data-bobot', BobotController::class);
        Route::resource('geologi-fisik', GeologiFisikController::class);
        Route::resource('kemiringan-lereng', KemiringanLerengController::class);
        Route::resource('data-titik', DataTitikController::class);
        Route::resource('data-gempa', DataGempaController::class);
        
        Route::group(['prefix' => 'informasi-tipologi' ], function(){
            Route::get('/', [InformasiTipologiController::class, 'index'])->name('admin.informasitipologi.index');
            Route::get('{id}/edit', [InformasiTipologiController::Class, 'edit'])->name('admin.informasitipologi.edit');
            Route::patch('{id}/update', [InformasiTipologiController::class, 'update'])->name('admin.informasitipologi.update');
        });


        Route::group(['prefix' => 'kegempaan/'], function(){
            Route::get('/', [KegempaanController::class, 'index'])->name('admin.kegempaan.index');
        });

        Route::group(['prefix' => 'struktur-geologi/'], function(){
            Route::get('/', [StrukturGeologiController::class, 'index'])->name('admin.struktur-geologi.index');
        });

        Route::group(['prefix' => 'data-uji-gempa-lama' ], function(){
            Route::get('/', [DataUjiGempaLamaController::class, 'index'])->name('admin.dataujilama.index');
            route::POST('/proses-metode', [DataUjiGempaLamaController::class, 'proses_metode'])->name('admin.dataujigempa-lama.proses_metode');
        });
    });

//user    
Route::group(['prefix' => 'data-uji-gempa-lama'], function(){
        Route::get('/', [UserdataujilamaController::Class, 'index'] )->name('user.data-uji-gempa-lama');
        route::POST('/proses-kalkulasi', [UserdataujilamaController::class, 'proses_kalkulasi'])->name('user.data-uji-gempa-lama.proses-kalkulasi');
        Route::get('/realtime', [UjiDataRealtimeController::Class, 'index'] )->name('user.data-uji-realtime');
});
    
    
    Route::get('/connexion', [LoginController::Class, 'index'] )->name('connexion');
    Route::post('/connexion', [LoginController::Class, 'authenticate'] )->name('proses_connexion');
    Route::post('/logout-connexion', [LoginController::Class, 'logout'])->name('logout-connexion');
    
    
    // Route::get('/lereng', [TestKemiringanController::Class, 'index'] )->name('testLerengg');
    // Route::post('/test-kemiringannn-lereng', [TestKemiringanController::Class, 'cek'] )->name('test-lereng');