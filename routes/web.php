<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a given Closure or controller and enjoy the fresh air.
|
*/

/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@home');

/*
|--------------------------------------------------------------------------
| Login/ Logout/ Password
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Registration & Activation
|--------------------------------------------------------------------------
*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('activate/token/{token}', 'Auth\ActivateController@activate');
Route::group(['middleware' => ['auth']], function () {
    Route::get('activate', 'Auth\ActivateController@showActivate');
    Route::get('activate/send-token', 'Auth\ActivateController@sendToken');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'active']], function () {

    /*
    |--------------------------------------------------------------------------
    | General
    |--------------------------------------------------------------------------
    */

    Route::get('/users/switch-back', 'Admin\UserController@switchUserBack');

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::get('settings', 'SettingsController@settings');
        Route::post('settings', 'SettingsController@update');
        Route::get('password', 'PasswordController@password');
        Route::post('password', 'PasswordController@update');
    });

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', 'PagesController@dashboard');

    /*
    |--------------------------------------------------------------------------
    | Team Routes
    |--------------------------------------------------------------------------
    */

    Route::get('team/{name}', 'TeamController@showByName');
    Route::resource('teams', 'TeamController', ['except' => ['show']]);
    Route::post('teams/search', 'TeamController@search');
    Route::post('teams/{id}/invite', 'TeamController@inviteMember');
    Route::get('teams/{id}/remove/{userId}', 'TeamController@removeMember');

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

        Route::get('dashboard', 'DashboardController@index');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */
        Route::resource('users', 'UserController', ['except' => ['create', 'show']]);
        Route::post('users/search', 'UserController@search');
        Route::get('users/search', 'UserController@index');
        Route::get('users/invite', 'UserController@getInvite');
        Route::get('users/switch/{id}', 'UserController@switchToUser');
        Route::post('users/invite', 'UserController@postInvite');

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
        Route::post('roles/search', 'RoleController@search');
        Route::get('roles/search', 'RoleController@index');
    });
});

/*
|--------------------------------------------------------------------------
| Orador Routes
|--------------------------------------------------------------------------
*/

Route::resource('oradors', 'OradorsController', ['except' => ['show']]);
Route::post('oradors/search', [
    'as' => 'oradors.search',
    'uses' => 'OradorsController@search'
]);

/*
|--------------------------------------------------------------------------
| Participante Routes
|--------------------------------------------------------------------------
*/

Route::resource('participantes', 'ParticipantesController', ['except' => ['show']]);
Route::post('participantes/search', [
    'as' => 'participantes.search',
    'uses' => 'ParticipantesController@search'
]);

/*
|--------------------------------------------------------------------------
| Palestra Routes
|--------------------------------------------------------------------------
*/

Route::resource('palestras', 'PalestrasController', ['except' => ['show']]);
Route::post('palestras/search', [
    'as' => 'palestras.search',
    'uses' => 'PalestrasController@search'
]);

/*
|--------------------------------------------------------------------------
| Workshop Routes
|--------------------------------------------------------------------------
*/

Route::resource('workshops', 'WorkshopsController', ['except' => ['show']]);
Route::post('workshops/search', [
    'as' => 'workshops.search',
    'uses' => 'WorkshopsController@search'
]);

/*
|--------------------------------------------------------------------------
| Programacao Routes
|--------------------------------------------------------------------------
*/

Route::resource('programacaos', 'ProgramacaosController', ['except' => ['show']]);
Route::post('programacaos/search', [
    'as' => 'programacaos.search',
    'uses' => 'ProgramacaosController@search'
]);

/*
|--------------------------------------------------------------------------
| FAQ Routes
|--------------------------------------------------------------------------
*/

Route::resource('f_a_qs', 'FAQsController', ['except' => ['show']]);
Route::post('f_a_qs/search', [
    'as' => 'f_a_qs.search',
    'uses' => 'FAQsController@search'
]);

/*
|--------------------------------------------------------------------------
| Foto Routes
|--------------------------------------------------------------------------
*/

Route::resource('fotos', 'FotosController', ['except' => ['show']]);
Route::post('fotos/search', [
    'as' => 'fotos.search',
    'uses' => 'FotosController@search'
]);
