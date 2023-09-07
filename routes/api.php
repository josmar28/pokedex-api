<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//moves
Route::get('/fetch-move-lists', [App\Http\Controllers\admin\ApiCtrl::class, 'fetchMoves']);
Route::post('/submit-add-move', [App\Http\Controllers\admin\ApiCtrl::class, 'moveActions']);
Route::post('/submit-delete-move', [App\Http\Controllers\admin\ApiCtrl::class, 'moveDelete']);
Route::post('/submit-edit-move', [App\Http\Controllers\admin\ApiCtrl::class, 'moveEdit']);


//types
Route::get('/fetch-type-lists', [App\Http\Controllers\admin\ApiCtrl::class, 'fetchTypes']);
Route::post('/submit-add-type', [App\Http\Controllers\admin\ApiCtrl::class, 'typeActions']);
Route::post('/submit-delete-type', [App\Http\Controllers\admin\ApiCtrl::class, 'typeDelete']);
Route::post('/submit-edit-type', [App\Http\Controllers\admin\ApiCtrl::class, 'typeEdit']);

//pokemons
Route::get('/fetch-pokemon-lists', [App\Http\Controllers\admin\ApiCtrl::class, 'fetchPokemon']);
Route::post('/submit-add-pokemon', [App\Http\Controllers\admin\ApiCtrl::class, 'pokemonActions']);
Route::post('/submit-delete-pokemon', [App\Http\Controllers\admin\ApiCtrl::class, 'pokemonDelete']);
Route::post('/submit-edit-pokemon', [App\Http\Controllers\admin\ApiCtrl::class, 'pokemonEdit']);


