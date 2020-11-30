<?php

use Illuminate\Support\Facades\Route;


// Route::get('/',function(){
//   return "Le papa noel";
// });

Auth::routes();


// Route::prefix('74uAExW4d')->group(function () {
    Route::get('/',                                             'AdminNavigationController@accueil')->name('bienvenue');
    Route::get('/accueil',                                      'AdminNavigationController@accueil')->name('accueil');
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
    Route::get('/user/profile', 'UtilisateursController@profil')->name('profil');
    Route::get('/user/password/edit', 'UtilisateursController@edit_password')->name('edit_password');
    Route::patch('/user/password/edit', 'UtilisateursController@change_password')->name('change_password');
    Route::get('/pays/ville/{pay_id}', 'LocaliteController@ville_by_country');
    Route::view('/{patch?}', 'layouts.masterreact');
    // });