<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\PapelController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\V1\UserCollection;
use App\Models\Estudante;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/
Route::resource('/papel',PapelController::class)->middleware('auth:sanctum');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::resource('/users',UserController::class)->middleware('auth:sanctum');;
Route::resource('/permissoes',PermissaoController::class)->middleware('auth:sanctum');;
Route::resource('/papeis',PapelController::class)->middleware('auth:sanctum');
Route::resource('/estudantes',EstudanteController::class);
//Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');