<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Route::get('/',                                             'AdminNavigationController@accueil')->name('bienvenue');
Route::prefix('admin')->group(function () {
    Route::get('/',                                      'AdminNavigationController@accueil')->name('accueil');
    Route::resource('utilisateurs',                             'UtilisateursController');
    Route::resource('roles',                                    'RoleController');
    Route::resource('commentaires',                                    'CommentaireController');
    Route::resource('type_menus',                                    'TypeMenuController');
    Route::resource('menus',                                    'MenuController');
    Route::resource('operateurs',                                    'OperateurController');
    Route::resource('apis',                                    'ApiController');
    Route::get('utilisateurs/gerer/{utilisateur}',              'UtilisateursController@gerer')->name('gerer-utilisateur');
    Route::get('/user/profil', 'UtilisateursController@profil')->name('profil');
    Route::get('/user/password/edit', 'UtilisateursController@edit_password')->name('edit_password');
    Route::patch('/user/password/edit', 'UtilisateursController@change_password')->name('change_password');
});
Route::get('/',function(){
    return redirect('/admin');
});
//les routes du frontoffice
Route::get('apis/sms', 'ApiController@sms');
Route::get('api/operateurs', 'OperateurController@operateurs');
Route::get('api/menu/liste/{menu}', 'MenuController@api');
Route::get('api/menu/liste/automate/{automateId}', 'MenuController@list_by_automate_id');

Auth::routes();
