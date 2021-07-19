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

//les routes pour afficher les données (operateur menu sousmenu rubrique) en json
Route::get('api/menu/liste', 'MenuController@listeMenu');

// les routes du CRUD pour la validation des messages
ROUTE::resource('validation', 'ValidationController');

//les routes du CRUD pour faire un slug pour les messages
ROUTE::resource('message', 'MessageController');
// Route::post('message.store', 'MessageController@store')->except('store');

//Les routes du CRUD pour servicefoot
Route::resource('servicefoot', 'ServiceFootController');

//les routes du CRUD pour la coupe du monde
Route::resource('coupedumonde', 'CoupeDuMondeController');

//les routes du CRUD pour la ligue des champions
Route::resource('liguechampion', 'LigueDesChampionController');

//les routes du CRUD pour l'europa ligue
Route::resource('europaligue', 'EuropaLigueController');

//les routes du CRUD pour l'euro
Route::resource('euro', 'EuroController');

//les routes du CRUD pour la copa
Route::resource('copa', 'CopaController');

//les routes du CRUD pour la can
Route::resource('can', 'CanController');