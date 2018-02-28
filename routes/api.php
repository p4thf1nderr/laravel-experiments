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



Route::prefix('articles')->group(function () {
    Route::get('/', 'ArticleController@index');

    Route::get('/{id:[\d]+}',[
        'as' => 'article.show'
        ]);

    Route::post('/', 'ArticleController@store');
    }
);
