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
    return view('welcome');
});

Route::resource('location', 'LocationsController');
Route::get('/getLocation','LocationsController@getLocation');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//add all routes here to have auth middleware
Route::group(['middleware' => 'auth'], function() {
	//Routes for updating user information.
    Route::resource('account', 'UserInfoController');
    //will add more device controller for user.
	Route::resource('/device', 'DeviceController')->only('store');
	Route::resource('/groups', 'GroupsController')->only('index');
	Route::resource('/peers', 'PeersController');
	Route::resource('/friend','FriendsController')->except('index');
	Route::get('countFriendNotifications','FriendsController@index');
	Route::get('getFriendNotifsAjax','FriendsController@getList');
});
Route::get('/search','UserInfoController@search')->name('search');
