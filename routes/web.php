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

//Les routes du CRUD pour les differentes competitions
Route::resource('competitions', 'CompetitionController'); 
Route::get('ajout', 'CompetitionController@ajouter');
Route::get('/direct', 'CompetitionController@competitionDirect');
Route::get('/show', 'CompetitionController@testShow');
Route::resource('date', 'DateController');

//les routes pour afficher les données (operateur menu sousmenu rubrique) en json
Route::get('api/menu/liste', 'MenuController@listeMenu');

// les routes du CRUD pour la validation des messages
ROUTE::resource('validation', 'ValidationController');

//les routes du CRUD pour faire un slug pour les messages
ROUTE::resource('message', 'MessageController');
Route::get('/coupedumonde', 'MessageController@coupeDuMonde');
Route::get('/liguechampion', 'MessageController@ligueDesChampion');
Route::get('/europaligue', 'MessageController@europaLigue');
Route::get('/euro', 'MessageController@euro');
Route::get('/copa', 'MessageController@copa');
Route::get('/can', 'MessageController@can');
Route::get('/servicefoot', 'MessageController@serviceFoot');
// Route::post('message.store', 'MessageController@store')->except('store');

//Les routes du CRUD pour servicefoot
Route::resource('servicefoot', 'ServiceFootController');

Route::get('/clear-cache', function() {

Artisan::call('cache:clear');

Artisan::call('optimize');

Artisan::call('optimize:clear');

return "Cache is cleared";

});

Route::get('/controller', function() {

Artisan::call('make:livewire RobotMode');
Artisan::call('make:livewire RobotPower');

return "Created successfully";

});


Route::get('/fill-cache', function() {

Artisan::call('view:cache');

Artisan::call('route:cache');

Artisan::call('config:cache');

return "Cache filled successfully";

});



Route::get('/auto-load', function() {

return "<pre>". shell_exec ('composer dump-autoload')."</pre>";

});