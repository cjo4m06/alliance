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

Route::get('/', function () {
    return 'OK';
})->name('web.index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [
        'as' => 'web.register.show',
        'uses' => 'AuthController@show'
    ]);

    Route::post('register', [
        'as' => 'web.register.store',
        'uses' => 'AuthController@register',
    ]);

    Route::get('login', [
        'as' => 'web.login',
        'uses' => 'AuthController@login',
    ]);

    Route::post('authenticate', [
        'as' => 'web.authenticate',
        'uses' => 'AuthController@authenticate',
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [
        'as' => 'web.logout',
        'uses' => 'AuthController@logout',
    ]);
});
