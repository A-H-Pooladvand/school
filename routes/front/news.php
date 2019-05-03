<?php

Route::group(['prefix' => 'news', 'as' => 'news.', 'namespace' => 'News\Front'], static function () {

    Route::get('/', 'NewsController@index')->name('index');
    Route::get('{id}', 'NewsController@show')->name('show');

});