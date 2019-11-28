<?php

Route::group(['prefix' => 'grid', 'as' => 'grid.', 'namespace' => 'Grid\Admin'], static function () {
    Route::post('{module_name}', 'GridController@index')->name('index');
});