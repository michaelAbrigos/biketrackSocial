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
//Route::post('login','api\AuthController@loginWeb');

Route::get('user/verify/{verification_code}', 'api\AuthController@verifyUser');

//add all routes here to have auth middleware
Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('location', 'LocationsController');
	Route::get('/ride','LocationsController@ride');
	Route::get('/getLocation','LocationsController@getLocation');
	Route::get('/getLocation/groups/{id}','GroupsController@MemberLocations');
	
	//Routes for updating user information.
	Route::get('account/getUsernameEmail','UserInfoController@getUsernameEmail');
    Route::resource('account', 'UserInfoController');

	Route::resource('/device', 'DeviceController');
	Route::resource('/groups', 'GroupsController')->only('index','store','show');
	Route::resource('/peers', 'PeersController');
	Route::get('friends/requests','FriendsController@FriendRequest')->name('friends.requests');
	Route::get('friends/declineFriend/{id}','FriendsController@declineFriend')->name('friends.declineRequest');
	Route::get('friend/autocomplete','FriendsController@friendsArray');
    Route::resource('/friends','FriendsController');
	Route::get('countFriendNotifications','FriendsController@countFriendNotifs');
	Route::get('getFriendNotifsAjax','FriendsController@getList');
	Route::post('confirmFriend','FriendsController@confirmFriend');
	Route::get('getNotifs','FriendsController@getUnreadNotifs');

	Route::get('history','HistoryController@showHistoryView');
	Route::post('history','HistoryController@rangeHistory')->name('historySearch');
	Route::get('/search','UserInfoController@search')->name('search');

	Route::post('saveLocationforHistory','HistoryController@saveHistory');
});

