<?php

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

// done
Auth::routes();

// done
Route::get('/', 'HomeController@welcome')
    ->name('welcome');

//
Route::get('/home', 'ProfileController@home')
    ->name('home');

Route::get('/profile', 'ProfileController@me')
    ->name('user.profile');

Route::get('/profile/edit', 'ProfileController@edit')
    ->name('user.profile.edit');

Route::put('/profile/edit', 'ProfileController@update')
    ->name('user.profile.update');

// other users profile
Route::get('/profile/{username}', 'ProfileController@user')
    ->name('user.profile.user');

Route::post('/status/create', 'StatusController@create')
    ->name('status.create');

// api
Route::group(['prefix' => 'api'], function(){
    Route::get('/status/{username}', 'ApiController@index')
        ->name('api.status');
});
