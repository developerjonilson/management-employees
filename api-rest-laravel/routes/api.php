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
Route::get('master', 'UserController@master');

Route::post('auth/login', 'UserController@login')->name('auth.login');

Route::middleware('jwt.auth')->group(function () {
    Route::post('auth/logout', 'UserController@logout')->name('auth.logout');
    Route::get('auth/user', 'UserController@getAuthUser')->name('auth.user');

    Route::prefix('contributors')->group(function () {
        Route::post('store', 'UserController@register')->name('contributors.register');
        Route::get('list', 'ContributorController@index')->name('contributors.index');
        Route::get('{id}', 'ContributorController@show')->name('contributors.show');

        Route::prefix('schedules')->group(function () {
            Route::post('store', 'ScheduleController@store')->name('schedules.store');
            Route::get('{id}', 'ScheduleController@show')->name('schedules.show');
            Route::get('list/{id}', 'ScheduleController@index')->name('schedules.index');
            Route::get('{id}/export', 'ScheduleController@export')->name('schedules.export');
        });
    });
});

