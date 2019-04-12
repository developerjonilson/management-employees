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

// Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');

Route::middleware('jwt.auth')->group(function () {
    Route::post('auth/logout', 'UserController@logout');
    Route::get('auth/user', 'UserController@getAuthUser');

    Route::prefix('contributors')->group(function () {
        Route::post('store', 'UserController@register')->name('contributors.register');
        Route::get('list', 'ContributorController@index')->name('contributors.index');
        Route::get('{id}', 'ContributorController@show')->name('contributors.show');

        Route::prefix('schedules')->group(function () {
            Route::get('/', 'ScheduleController@index')->name('schedules.index');
            Route::post('store', 'ScheduleController@store')->name('schedules.store');
            Route::get('{id}', 'ScheduleController@show')->name('schedules.show');
        });
    });
});

