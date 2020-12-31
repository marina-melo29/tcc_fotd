<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CharacterHistoricController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\InitController;


//Gera o Token
Route::post('auth/login',    [AuthController::class, 'login'])      ->name('rest-auth');

//Envia para a tela de login
Route::get('/entrar',        [InitController::class,'login'])       ->name('login-screen');

//Personagem
Route::get('/character/{id}',[CharacterController::class,'show'])   ->name('character-screen');
Route::get('/ficha',         [CharacterController::class,'index'])  ->name('ficha');

//teste
Route::get('/teste',         [InitController::class, 'teste'])      ->name('teste');
Route::get('/users',         [UserController::class, 'index'])      ->name('users');
Route::get('/{id}',          [UserController::class, 'show'])       ->name('user-home');

//home
Route::get('/',              [InitController::class,'index'])       ->name('index');




//Rotas que necessitam token
Route::group(['prefix' => 'auth', 'middleware' => 'api'], function(){

    Route::get('users/',             [UserController::class, 'index'])                          ->name('users');
    Route::post('auth/logout',       [AuthController::class, 'logout'])                         ->name('logout');
    Route::get('/Historico_de_Ficha',[CharacterHistoricController::class, 'get_records_layout'])->name('character.historic');

});

Auth::routes();



