<?php

Route::group(['prefix' => 'services', 'as' => 'service.', 'namespace' => 'Service\Front'], function () {

    Route::get('/', 'ServiceController@index')->name('index');
    Route::get('{id}', 'ServiceController@show')->name('show');

});
