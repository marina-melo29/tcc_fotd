<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterHistoricController;
use App\Http\Controllers\InitController;

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

Route::get('/',[InitController::class,'index'])->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) ->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/historico',                       [CharacterHistoricController::class,'index'])      ->name('historico');
    Route::post('/historico/ficha/',[CharacterHistoricController::class,'getCreator']) ->name('user.ficha');
    Route::post('/historico/ficha/novo',           [CharacterHistoricController::class,'ficha'])      ->name('nova-ficha');
});

