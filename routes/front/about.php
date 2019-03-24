<?php

Route::group(['prefix' => 'about', 'as' => 'about.', 'namespace' => 'About\Front'], function () {

    Route::get('{id}', 'AboutController@show')->name('show');

});