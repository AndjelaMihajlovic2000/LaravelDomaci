<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



//Route::middleware('auth:sanctum')->apiResource('recipes', RecipeController::class);
Route::resource('recipes',RecipeController::class)->only(['index','show']);
Route::group(['middleware'=>['auth:sanctum']],function (){

    Route::get('/profil',function (Request $request){
        return auth()->user();
    });

    Route::resource('recipes',RecipeController::class)->only(['update','store','destroy']);

    Route::post('logout',[AuthController::class,'logout']);

});

// GET /recipes - vrati sve - metoda index
// POST /recipes - kreiraj - metoda store
// GET /recipes/{id} - vrati sa tim id jem - metoda show
// PUT /recipes/{id} - izmeni recept sa datim id jem na osnovu tela zahteva - metoda update
// DELETE /recipes/{id} - obrisi recept sa datim id jem - metoda destroy 
