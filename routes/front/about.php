<?php

Route::group(['prefix' => 'about', 'as' => 'about.', 'namespace' => 'About\Front'], static function () {
    Route::get('/', 'AboutController@show')->name('show');
});
