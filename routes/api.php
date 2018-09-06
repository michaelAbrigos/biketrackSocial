<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', 'api\AuthController@register');
Route::post('login', 'api\AuthController@login');
Route::post('recover', 'api\AuthController@recover');
Route::post('saveLocation','api\HistoryController@store');


Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'api\AuthController@logout');
    Route::post('saveLocationforHistory','api\HistoryController@saveHistoryForMobile');
    Route::post('deviceSave','api\DeviceController@storeCodeMobile');
    Route::post('friends','api\FriendsController@store');
    Route::delete('friends/{id}','api\FriendsController@destroy');
    Route::post('declineFriend/{id}','api\FriendsController@declineFriend');
    Route::post('saveInformation','api\AuthController@informationSave');
    Route::get('friends','api\FriendsController@friendsArray');
    Route::get('checkInfo','api\AuthController@checkExists');
    Route::post('noDeviceHistory','api\HistoryController@rangeHistory');
    Route::get('getLocation','api\DeviceController@retrieveLatestDeviceLocation');
    Route::get('getPlaces','api\PlacesController@getAllPlaces');
    Route::post('DeviceHistory','api\HistoryController@historyDevice');
    Route::get('device','api\DeviceController@getDeviceFromUser');
	Route::get('friend/autocomplete','api\FriendsController@friendsArray');
    Route::post('user/search','api\FriendsController@search');
    Route::post('friend/save','api\FriendsController@store');
});

Route::post('/leaveGroup','GroupsController@leaveGroup');
