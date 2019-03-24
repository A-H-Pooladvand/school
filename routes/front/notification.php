<?php

Route::group(['prefix' => 'notifications', 'as' => 'notification.', 'namespace' => 'Notification\Front'], function () {

    Route::get('/', 'NotificationController@index')->name('index');
    Route::get('{id}', 'NotificationController@show')->name('show');

});
