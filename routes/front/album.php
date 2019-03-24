<?php

Route::group(['prefix' => 'albums', 'as' => 'album.', 'namespace' => 'Album\Front'], function () {

    Route::get('/', 'AlbumController@index')->name('index');
    Route::get('{id}', 'AlbumController@show')->name('show');

});