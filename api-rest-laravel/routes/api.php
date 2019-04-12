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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('master', 'UserController@master');

Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');

Route::middleware('jwt.auth')->group(function () {
    Route::get('user', 'UserController@getAuthUser');
    
    Route::prefix('schedules')->group(function () {
        Route::get('/', 'ScheduleController@index');
        Route::post('store', 'ScheduleController@store');
        Route::get('show', 'ScheduleController@show');
        // Route::get('update', 'ScheduleController@update');
        // Route::get('destroy', 'ScheduleController@destroy');
    });
});

