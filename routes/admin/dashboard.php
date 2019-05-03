<?php

Route::get('/', 'Main\Admin\MainController@show')->name('home');
Route::get('setting', 'Main\Admin\MainController@edit')->name('setting.edit');
Route::put('/', 'Main\Admin\MainController@update')->name('setting.update');