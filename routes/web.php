<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('logout',function(){
    Auth::logout();
return redirect('/');
});

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');
Route::get('/admin', [App\Http\Controllers\admin\AdminCtrl::class, 'index'])->name('admin');

//moves
Route::get('/pokemon/moves', [App\Http\Controllers\admin\MoveCtrl::class, 'index']);
Route::get('/fetch-move-lists', [App\Http\Controllers\admin\MoveCtrl::class, 'fetchMoves']);

//types
Route::get('/pokemon/types', [App\Http\Controllers\admin\TypeCtrl::class, 'index']);
Route::get('/fetch-type-lists', [App\Http\Controllers\admin\TypeCtrl::class, 'fetchType']);

//pokemon
Route::get('/pokemon', [App\Http\Controllers\admin\PokemonCtrl::class, 'index']);
Route::get('/fetch-pokemon-lists', [App\Http\Controllers\admin\PokemonCtrl::class, 'fetchType']);