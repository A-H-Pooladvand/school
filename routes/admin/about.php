<?php

Route::group(['prefix' => 'about', 'as' => 'about.', 'namespace' => 'About\Admin'], function () {

    Route::get('edit', 'AboutController@edit')->name('edit')->middleware('permission:edit-about');
    Route::put('/', 'AboutController@update')->name('update')->middleware('permission:edit-about');

});
