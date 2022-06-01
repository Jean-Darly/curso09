<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ConfigController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Route::get('welcome', 'App\Http\Controllers\HomeController@index');
Route::get('/',                     [HomeController::class, 'index']);
Route::get('/ponto',                [PontoController::class, 'index']);
Route::post('/ponto/ver',           [PontoController::class, 'pontoVer']);
Route::post('/ponto/registrar',     [PontoController::class, 'pontoRegistrar']);
Route::get('/foto',                 [PontoController::class, 'foto']);
Route::get('/checkin',              [CheckinController::class, 'index'])->middleware('auth');
Route::get('/config',               [ConfigController::class, 'config'])->middleware('auth');
Route::get('/config/checkin',       [ConfigController::class, 'configCheckin'])->middleware('auth');
