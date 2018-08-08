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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'api\AuthController@register');
Route::post('login', 'api\AuthController@login');
Route::post('recover', 'api\AuthController@recover');
Route::post('device','api\DeviceController@saveDevice');


Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'api\AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});

Route::post('/leaveGroup','GroupsController@leaveGroup');






