<?php

Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function() {
    Route::post('auth', 'UserController@auth');

    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{id}', 'CategoryController@show');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'v1', 'namespace' => 'V1'], function() {
    Route::get('user', 'UserController@index');

    Route::post('categories', 'CategoryController@store');
    Route::put('categories/{id}', 'CategoryController@update');
    Route::delete('categories/{id}', 'CategoryController@delete');

    Route::post('products', 'ProductController@store');
    Route::put('products/{id}', 'ProductController@update');
    Route::delete('products/{id}', 'ProductController@delete');
});