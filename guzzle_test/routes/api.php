<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!`
|
*/

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');



Route::get('logout', 'AuthController@logout');
 
Route::get('getUser', 'AuthController@getAuthUser');


// Route::group(['middleware' => ['jwt.auth']],function(){

   
    Route::get('logout', 'AuthController@logout');
 
    Route::get('getUser', 'AuthController@getAuthUser');
 
    Route::resource('users','UserController');
    Route::post('registerByUser','UserController@register');
    Route::resource('userinfos','UserInfoController');
    Route::resource('customers','CustomerController');
    Route::resource('cities','CityController');

    Route::resource('townships','TownshipController');
    //get townships  by city id
    Route::get('townshipbycity/{city_id}','TownshipController@getTownshipByCityId');


    Route::resource('hotels','HotelController');
    //get hotels by city id
    Route::get('/hotelbycity/{city_id}','HotelController@getHotelByCityId');   
    Route::resource('hotelhascustomers','HotelHasCustomerController');
    Route::resource('agentfees','AgentFeeController');
    Route::resource('rooms','RoomController');
    Route::resource('roomavas','RoomAvaController');

// });
Route::get('index','CountryController@index');
