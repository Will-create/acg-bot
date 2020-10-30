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

Route::get('/',function(){
  return redirect()->route('accueil');
});


Route::prefix('74uAExW4d')->group(function () {
    Route::get('/',                                             'AdminNavigationController@accueil')->name('accueil');
   
    Route::get('/home','UniteController@index')->name('home');

    Route::get('/pays','PayController@index')->name('pays.index');
    


    Route::resource('unites', 'UniteController'); 

});


