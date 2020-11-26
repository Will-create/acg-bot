<?php

use Illuminate\Support\Facades\Route;


// Route::get('/',function(){
//   return "Le papa noel";
// });

Auth::routes();


// Route::prefix('74uAExW4d')->group(function () {
    // Route::get('/',                                             'AdminNavigationController@bienvenue')->name('bienvenue');
    Route::get('/accueil',                                      'AdminNavigationController@accueil')->name('accueil');
    Route::resource('utilisateurs',                             'UtilisateursController');
    Route::resource('roles',                                    'RoleController');
    Route::get('utilisateurs/gerer/{utilisateur}',              'UtilisateursController@gerer')->name('gerer-utilisateur');
    Route::resource('crimes',                                   'CrimeController');


    Route::resource('nature_crimes',                            'CrimeNatureController');

    Route::get('/home','UniteController@index')->name('home');

    Route::get('/pays','PayController@index')->name('pays.index');
    Route::get('/pays/{pay}','PayController@show')->name('pays.show');



    Route::resource('unites', 'UniteController');
    Route::resource('localites', 'LocaliteController');
    Route::resource('especes', 'EspeceController');
    Route::resource('confiscations', 'CrimeConfiscationController');

    Route::resource('type_crimes', 'TypeCrimeController');
    Route::get('/user/profile', 'UtilisateursController@profil')->name('profil');
    Route::get('/user/password/edit', 'UtilisateursController@edit_password')->name('edit_password');
    Route::patch('/user/password/edit', 'UtilisateursController@change_password')->name('change_password');
    Route::get('/pays/ville/{pay_id}', 'LocaliteController@ville_by_country');

    Route::view('/{patch?}', 'layouts.masterreact');
    // });


