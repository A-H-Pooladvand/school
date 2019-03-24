<?php

Route::group(['prefix' => 'notifications', 'as' => 'notification.', 'namespace' => 'Notification\Admin'], function () {

    Route::get('/', 'NotificationController@index')->name('index')->middleware('permission:read-notification');
    Route::post('items', 'NotificationController@items')->name('items')->middleware('permission:read-notification');
    Route::get('create', 'NotificationController@create')->name('create')->middleware('permission:create-notification');
    Route::post('/', 'NotificationController@store')->name('store')->middleware('permission:create-notification');
    Route::get('{id}', 'NotificationController@show')->name('show')->middleware('permission:read-notification');
    Route::get('edit/{id}', 'NotificationController@edit')->name('edit')->middleware('permission:edit-notification');
    Route::put('{id}', 'NotificationController@update')->name('update')->middleware('permission:edit-notification');
    Route::delete('{id}', 'NotificationController@destroy')->name('destroy')->middleware('permission:delete-notification');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-notification|edit-notification');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-notification|edit-notification');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-notification|edit-notification');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-notification|edit-notification');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-notification|edit-notification');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-notification|edit-notification');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-notification|edit-notification');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-notification|edit-notification');

    });

});
