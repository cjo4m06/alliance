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

use App\Http\Middleware\PermissionMiddleware;

Route::get('/', function () {
    return redirect()->route('web.roles');
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

    Route::get('users/manage', [
        'as' => 'web.users.manage',
        'uses' => 'UserController@manage',
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

    Route::get('auctions', [
        'as' => 'web.auctions.index',
        'uses' => 'AuctionController@index'
    ]);

    Route::get('bosses', [
        'as' => 'web.bosses.index',
        'uses' => 'BossController@index',
    ]);

    Route::get('loots', [
        'as' => 'web.loots.index',
        'uses' => 'LootController@index',
    ]);

    Route::get('reports', [
        'as' => 'web.reports.index',
        'uses' => 'ReportController@index',
    ]);

    Route::get('items', [
        'as' => 'web.items',
        'uses' => 'ItemController@index',
    ]);
});

Route::group(['middleware' => ['auth', PermissionMiddleware::class]], function () {
    Route::post('items', [
        'as' => 'web.items.store',
        'uses' => 'ItemController@store',
    ]);

    Route::put('items/{item}', [
        'as' => 'web.items.update',
        'uses' => 'ItemController@update',
    ]);

    Route::put('users/manage/{user}/disable', [
        'as' => 'web.users.manage.disable',
        'uses' => 'UserController@disableManage',
    ]);

    Route::put('users/manage/{user}/enable', [
        'as' => 'web.users.manage.enable',
        'uses' => 'UserController@enableManage',
    ]);
});
