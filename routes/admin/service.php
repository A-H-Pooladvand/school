<?php

Route::group(['prefix' => 'services', 'as' => 'service.', 'namespace' => 'Service\Admin'], function () {

    Route::get('/', 'ServiceController@index')->name('index')->middleware('permission:read-service');
    Route::post('items', 'ServiceController@items')->name('items')->middleware('permission:read-service');
    Route::get('create', 'ServiceController@create')->name('create')->middleware('permission:create-service');
    Route::post('/', 'ServiceController@store')->name('store')->middleware('permission:create-service');
    Route::get('{id}', 'ServiceController@show')->name('show')->middleware('permission:read-service');
    Route::get('edit/{id}', 'ServiceController@edit')->name('edit')->middleware('permission:edit-service');
    Route::put('{id}', 'ServiceController@update')->name('update')->middleware('permission:edit-service');
    Route::delete('{id}', 'ServiceController@destroy')->name('destroy')->middleware('permission:delete-service');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-service|edit-service');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-service|edit-service');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-service|edit-service');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-service|edit-service');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-service|edit-service');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-service|edit-service');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-service|edit-service');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-service|edit-service');

    });

});
