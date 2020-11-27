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
    Route::resource('roles',                                    'RoleController');
    Route::get('utilisateurs/gerer/{utilisateur}',              'UtilisateursController@gerer')->name('gerer-utilisateur');
    Route::resource('crimes',                                   'CrimeController');

    
    Route::resource('nature_crimes',                            'CrimeNatureController');

    Route::get('/home','UniteController@index')->name('home');
    Route::get('/localites/filtreur/{pays}','LocaliteController@filter')->name('localites.filter');
    Route::get('/unites/filtreur/{pays}','UniteController@filter')->name('unites.filter');
    Route::get('/unites/api/filtreur/{pays}','UniteController@filtreur');

    Route::resource('/pays','PayController');
    
    Route::resource('unites', 'UniteController');
    Route::resource('localites', 'LocaliteController');
    Route::resource('especes', 'EspeceController');
    Route::resource('confiscations', 'CrimeConfiscationController');
    
    Route::resource('type_crimes', 'TypeCrimeController');
    Route::resource('type_unites', 'TypeUniteController');

    Route::view('/{patch?}', 'layouts.masterreact');
// });


