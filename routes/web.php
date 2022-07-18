<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BobotController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataGempaController;
use App\Http\Controllers\Admin\DataTitikController;
use App\Http\Controllers\Admin\KegempaanController;
use App\Http\Controllers\Admin\GeologiFisikController;
use App\Http\Controllers\Admin\StrukturGeologiController;
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
    'prefix' => 'admin/'], function(){

        Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

        Route::resource('data-bobot', BobotController::class);
        Route::resource('geologi-fisik', GeologiFisikController::class);
        Route::resource('kemiringan-lereng', KemiringanLerengController::class);
        Route::resource('data-titik', DataTitikController::class);
        Route::resource('data-gempa', DataGempaController::class);
        
        Route::group(['prefix' => 'kegempaan/'], function(){
            Route::get('/', [KegempaanController::class, 'index'])->name('admin.kegempaan.index');
        });

        Route::group(['prefix' => 'struktur-geologi' ], function(){
            route::get('/', [StrukturGeologiController::class, 'index'])->name('admin.struktur-geologi.index');
            route::get('/page-nilai-str-geologi', [StrukturGeologiController::class, 'view_geologi'])->name('admin.nilai-struktur-geologi.index');
        });


    });