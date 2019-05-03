<?php

Route::group(['prefix' => 'menu', 'as' => 'menu.', 'namespace' => 'Menu\Admin'], static function () {

    Route::get('/', 'MenuController@index')->name('index')->middleware('permission:read-menu');
    Route::post('items', 'MenuController@items')->name('items')->middleware('permission:read-menu');
    Route::get('create', 'MenuController@create')->name('create')->middleware('permission:create-menu');
    Route::post('/', 'MenuController@store')->name('store')->middleware('permission:create-menu');
    Route::get('{id}', 'MenuController@show')->name('show')->middleware('permission:read-menu');
    Route::get('edit/{id}', 'MenuController@edit')->name('edit')->middleware('permission:edit-menu');
    Route::put('{id}', 'MenuController@update')->name('update')->middleware('permission:edit-menu');
    Route::delete('{id}', 'MenuController@destroy')->name('destroy')->middleware('permission:delete-menu');

});