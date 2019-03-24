<?php

Route::group(['prefix' => 'album', 'as' => 'album.', 'namespace' => 'Album\Admin'], function () {

    Route::get('/', 'AlbumController@index')->name('index')->middleware('permission:read-album');
    Route::post('items', 'AlbumController@items')->name('items')->middleware('permission:read-album');
    Route::get('create', 'AlbumController@create')->name('create')->middleware('permission:create-album');
    Route::post('/', 'AlbumController@store')->name('store')->middleware('permission:create-album');
    Route::get('{id}', 'AlbumController@show')->name('show')->middleware('permission:read-album');
    Route::get('edit/{id}', 'AlbumController@edit')->name('edit')->middleware('permission:edit-album');
    Route::put('{id}', 'AlbumController@update')->name('update')->middleware('permission:edit-album');
    Route::delete('{id}', 'AlbumController@destroy')->name('destroy')->middleware('permission:delete-album');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-album|edit-album');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-album|edit-album');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-album|edit-album');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-album|edit-album');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-album|edit-album');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-album|edit-album');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-album|edit-album');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-album|edit-album');

    });

});