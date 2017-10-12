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
    /**
     * product category api
     */
    Route::prefix('category')->group(function () {
        Route::get('/', 'Api\ProductCategoryController@index')->name('fetch_product_category');
        Route::get('/child', 'Api\ProductCategoryController@child')->name('fetch_child_product_category');
    });

    /**
     * product api
     */
    Route::prefix('product')->group(function () {
        Route::get('/suggest', 'Api\ProductController@suggest')->name('fetch_suggest_product');
        Route::get('/detail/{id}', 'Api\ProductController@detail')->name('fetch_detail_product');
    });

    /**
     * mall api
     */
    Route::prefix('mall')->group(function () {
        Route::get('/', 'Api\MallController@index')->name('fetch_mall');
    });

    /**
     * sale api
     */
    Route::prefix('sale')->group(function () {
        Route::get('/', 'Api\SaleController@index')->name('fetch_flash_sale');
    });

    /**
     * comment api
     */
    Route::prefix('comment')->group(function () {
        Route::get('/', 'Api\CommentController@index')->name('fetch_comment');
    });

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
