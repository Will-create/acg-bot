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

// Route::get('/',function(){
//   return redirect()->route('accueil');
// });


// Route::prefix('74uAExW4d')->group(function () {
    Route::get('/',                                             'AdminNavigationController@accueil')->name('accueil');
    Route::resource('utilisateurs',                             'UtilisateursController');
    Route::get('utilisateurs/gerer/{utilisateur}',              'UtilisateursController@gerer')->name('gerer-utilisateur');
    Route::resource('crimes',                                   'CrimeController');

    Route::resource('espace_vegetal',                           'EspeceVegetalController');
    Route::resource('nature_crimes',                            'CrimeNatureController');

    Route::get('/home','UniteController@index')->name('home');

    Route::get('/pays','PayController@index')->name('pays.index');
    Route::get('/pays/{pay}','PayController@show')->name('pays.show');



    Route::resource('unites', 'UniteController');
    Route::resource('villes', 'VilleController');
    Route::resource('espece_animales', 'EspeceAnimalController');
    Route::resource('espece_vegetales', 'EspeceVegetalController');

    Route::view('/{patch?}', 'layouts.masterreact');

// });


