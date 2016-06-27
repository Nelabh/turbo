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
Route::get('offers',array('as'=>'offers','uses'=>'DealerController@offers'));
Route::post('add_offer',array('as'=>'add_offer','uses'=>'DealerController@add_offer'));
Route::post('add_device',array('as'=>'add_device','uses'=>'DealerController@add_device'));
Route::get('delete_device/{id}',array('as'=>'delete_device','uses'=>'DealerController@delete_device'));
Route::get('delete_offer/{id}',array('as'=>'delete_offer','uses'=>'DealerController@delete_offer'));
Route::get('delete_dealer/{id}',array('as'=>'delete_dealer','uses'=>'AdminController@delete_dealer'));
});



Route::post('check_device',array('as'=>'device','uses'=>'ApiController@check_device'));
Route::post('check_vehicle',array('as'=>'vehicle','uses'=>'ApiController@check_vehicle'));
Route::post('register',array('as'=>'register','uses'=>'ApiController@register'));
Route::post('fills',array('as'=>'fills','uses'=>'ApiController@fills'));
Route::post('calc',array('as'=>'calc','uses'=>'ApiController@calc'));

