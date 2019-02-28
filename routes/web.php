<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Web'], function() {
    Route::get('/', ['uses' => 'ImageController@upload', 'as' => 'web.upload']);
    Route::get('/img/{imageId}', ['uses' => 'ImageController@get', 'as' => 'web.image']);
    Route::get('/img/tag/{tagName}', ['uses' => 'ImageController@listByTag', 'as' => 'web.image.listByTag']);

    Route::get('/tag', ['uses' => 'TagController@index', 'as' => 'web.tag']);
});

