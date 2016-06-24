<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',array('as'=>'home','uses'=>'PagesController@home'));
Route::get('dashboard',array('as'=>'dashboard','uses'=>'PagesController@dashboard'));

Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
Route::post('log',array('as'=>'login','uses'=>'PagesController@log'));



Route::group(['middleware' => ['auth']], function () {
Route::get('dealers',array('as'=>'dealers','uses'=>'AdminController@dealers'));
Route::post('add_dealer',array('as'=>'add_dealer','uses'=>'AdminController@add_dealer'));
Route::get('devices',array('as'=>'devices','uses'=>'DealerController@devices'));
Route::post('add_device',array('as'=>'add_device','uses'=>'DealerController@add_device'));

});



Route::post('check_device',array('as'=>'check','uses'=>'ApiController@check_device'));