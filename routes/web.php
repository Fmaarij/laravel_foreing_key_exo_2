<?php

use App\Http\Controllers\AlbumController;
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

Route::get('/', [AlbumController::class,'index'])->name('albums');
Route::get('/addalbum', [AlbumController::class,'create'])->name('addalbum');
Route::post('/createalbum', [AlbumController::class,'store']);
Route::get('/show/{id}', [AlbumController::class,'show']);
Route::get('/edit/{id}', [AlbumController::class,'edit']);
Route::put('/{id}/update', [AlbumController::class,'update']);
Route::delete('/{id}/delete', [AlbumController::class,'destroy']);
Route::delete('/{id}/deletephoto', [AlbumController::class,'destroyphoto']);

