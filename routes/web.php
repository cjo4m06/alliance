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
    return redirect()->route('web.user');
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

    Route::put('user/{user}/password', [
        'as' => 'web.user.password',
        'uses' => 'UserController@password'
    ]);

    Route::get('user', [
        'as' => 'web.user',
        'uses' => 'UserController@index',
    ]);

    Route::put('user/{user}', [
        'as' => 'web.user.update',
        'uses' => 'UserController@update',
    ]);

    Route::get('roles', [
        'as' => 'web.roles',
        'uses' => 'RoleController@index',
    ]);

    Route::post('roles', [
        'as' => 'web.roles.store',
        'uses' => 'RoleController@store',
    ]);

    Route::put('roles/{role}', [
        'as' => 'web.roles.update',
        'uses' => 'RoleController@update',
    ]);

    Route::delete('roles', [
        'as' => 'web.roles.delete',
        'uses' => 'RoleController@delete',
    ]);

    Route::get('items', [
        'as' => 'web.items',
        'uses' => 'ItemController@index',
    ]);

    Route::post('items', [
        'as' => 'web.items.store',
        'uses' => 'ItemController@store',
    ]);
});
