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
Route::get('dealers',array('as'=>'dealers','uses'=>'DealerController@dealers'));
Route::get('admin',array('as'=> 'admin','uses'=>'AdminController@admin'));

Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
Route::post('log',array('as'=>'login','uses'=>'PagesController@log'));



Route::group(['middleware' => ['auth']], function () {
});
