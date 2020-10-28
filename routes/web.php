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

Auth::routes();
Route::get('/',                                             'NavigationController@accueil')->name('accueil');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pays', [App\Http\Controllers\PayController::class, 'index'])->name('pays.index');
Route::get('/pays/Ajouter', [App\Http\Controllers\PayController::class, 'create'])->name('pays.create');
Route::get('/pays/Ajouter', [App\Http\Controllers\PayController::class, 'create'])->name('pays.create');


Route::resource('unites',      App\Http\Controllers\UniteController::class); 
