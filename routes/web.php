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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => 'control-panel.', 'prefix' => ''], function()
{
    Route::get('/control-panel', ['as' => 'index', 'uses' => 'ControlPanelController@index']);

});

Route::group(['as' => 'account.', 'prefix' => '/account'], function()
{
    Route::get('', ['as' => 'index', 'uses' => 'AccountController@index']);
    Route::get('/find/{id}', ['as' => 'find', 'uses' => 'AccountController@find']);
    Route::get('/search/{search?}', ['as' => 'search', 'uses' => 'AccountController@search']);
    Route::get('/create', ['as' => 'create', 'uses' => 'AccountController@create']);
    Route::post('', ['as' => 'store', 'uses' => 'AccountController@store']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AccountController@edit']);
    Route::put('/{id}', ['as' => 'update', 'uses' => 'AccountController@update']);
    Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'AccountController@destroy']);
});

Route::group(['as' => 'accountType.', 'prefix' => '/accountType'], function()
{
    Route::get('/find/{accountCategory?}', ['as' => 'find', 'uses' => 'AccountTypeController@find']);
});
