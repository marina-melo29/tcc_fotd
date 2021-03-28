<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterHistoricController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\MagicsController;

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
    Route::get('/historico',                                [CharacterHistoricController::class,'index'])    ->name('historico');
    Route::post('/historico/ficha/{id_personagem}',         [CharacterController::class,'getEditor'])        ->name('user.ficha');
    Route::get('/historico/ficha/{id_personagem}',          [CharacterController::class,'getEditor'])        ->name('user.get.ficha');
    //Route::get('/historico/ficha/',                       [CharacterController::class,'ficha'])            ->name('ficha.ficha');
    Route::post('/historico/novo',                          [CharacterController::class,'create'])           ->name('ficha.new');
    Route::post('/historico/ficha/{id_personagem}/response',[CharacterController::class,'response'])         ->name('ficha.response');
    Route::get('/historico/ficha/{id_personagem}/update',   [CharacterController::class,'update'])           ->name('ficha.update');
    Route::post('/historico/ficha/{id_personagem}/delete',  [CharacterHistoricController::class,'destroy'])  ->name('ficha.delete');
    Route::get('/magias',                                   [MagicsController::class,'index'])               ->name('magias.get');
    Route::post('/magias/response',                         [MagicsController::class,'response'])            ->name('magias.response');
    Route::post('/magias/get-magia/',                         [MagicsController::class,'getMagic'])            ->name('magia.get');
});

