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

//controller
Route::get('init', 'initController@index');
Route::get('getLargeImage', 'getLargeImageController@getImg');
Route::get('getSmallImage', 'getSmallImageController@getImg');
Route::get('verify', 'verifyController@verify');

//Convert url to base64
Route::get('init/base64', 'initController@convertBase64');
Route::get('getLargeImage/base64', 'getLargeImageController@convertBase64');
Route::get('getSmallImage/base64', 'getSmallImageController@convertBase64');
Route::get('verify/base64', 'verifyController@convertBase64');