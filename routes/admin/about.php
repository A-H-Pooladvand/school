<?php

Route::group(['prefix' => 'about', 'as' => 'about.', 'namespace' => 'About\Admin'], function () {

    Route::get('/', 'AboutController@index')->name('index')->middleware('permission:read-about');
    Route::post('items', 'AboutController@items')->name('items')->middleware('permission:read-about');
    Route::get('create', 'AboutController@create')->name('create')->middleware('permission:create-about');
    Route::post('/', 'AboutController@store')->name('store')->middleware('permission:create-about');
    Route::get('{id}', 'AboutController@show')->name('show')->middleware('permission:read-about');
    Route::get('edit/{id}', 'AboutController@edit')->name('edit')->middleware('permission:edit-about');
    Route::put('{id}', 'AboutController@update')->name('update')->middleware('permission:edit-about');
    Route::delete('{id}', 'AboutController@destroy')->name('destroy')->middleware('permission:delete-about');

});