<?php

Route::group(['prefix' => 'tags', 'as' => 'tag.', 'namespace' => 'Tag\Front'], function () {
    Route::get('{slug}', 'TagController@index')->name('index');
});