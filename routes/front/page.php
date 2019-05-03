<?php

Route::group(['prefix' => 'pages', 'as' => 'page.', 'namespace' => 'Page\Front'], static function () {
    Route::get('{slug}', 'PageController@show')->name('show');
});