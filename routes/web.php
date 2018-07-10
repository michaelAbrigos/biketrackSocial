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

Auth::routes();


//add all routes here to have auth middleware
Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('location', 'LocationsController');
	Route::get('/getLocation','LocationsController@getLocation');
	
	//Routes for updating user information.
	Route::get('account/getUsernameEmail','UserInfoController@getUsernameEmail');
    Route::resource('account', 'UserInfoController');

    //will add more device controller for user.
	Route::resource('/device', 'DeviceController');
	Route::resource('/groups', 'GroupsController')->only('index');
	Route::resource('/peers', 'PeersController');
	Route::get('friends/requests','FriendsController@FriendRequest')->name('friends.requests');
	Route::get('friends/declineFriend/{id}','FriendsController@declineFriend')->name('friends.declineRequest');
    Route::resource('/friends','FriendsController');
	Route::get('countFriendNotifications','FriendsController@countFriendNotifs');
	Route::get('getFriendNotifsAjax','FriendsController@getList');
	Route::post('confirmFriend','FriendsController@confirmFriend');
	Route::get('getNotifs','FriendsController@getUnreadNotifs');
});
Route::get('/search','UserInfoController@search')->name('search');
