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

Route::prefix('v1')->middleware(['param.validate.api'])->group(function () {
	Route::get('test/success', 'Api\TestController@success');
	Route::get('test/error', 'Api\TestController@error');
	Route::get('test/param', 'Api\TestController@param');

	/**
	 * auth api
	 */
	Route::prefix('auth')->group(function () {
		Route::post('login', 'Api\AuthenticateController@login')->name('auth_login');
		Route::post('register', 'Api\AuthenticateController@register')->name('auth_register');
	});

	/**
	 * auth require api
	 */
	Route::middleware('jwt.api')->group(function () {
		Route::get('/user', function (Request $req) {
			return $req->user();
		});
	});
});