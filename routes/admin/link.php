<?php

Route::group(['prefix' => 'link', 'as' => 'link.', 'namespace' => 'Link\Admin'], static function () {

    Route::get('/', 'LinkController@index')->name('index')->middleware('permission:read-link');
    Route::get('create', 'LinkController@create')->name('create')->middleware('permission:create-link');
    Route::post('/', 'LinkController@store')->name('store')->middleware('permission:create-link');
    Route::get('{id}', 'LinkController@show')->name('show')->middleware('permission:read-link');
    Route::get('edit/{id}', 'LinkController@edit')->name('edit')->middleware('permission:edit-link');
    Route::put('{id}', 'LinkController@update')->name('update')->middleware('permission:edit-link');
    Route::delete('{id}', 'LinkController@destroy')->name('destroy')->middleware('permission:delete-link');

});