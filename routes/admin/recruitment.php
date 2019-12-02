<?php

Route::group(['prefix' => 'recruitment', 'as' => 'recruitment.', 'namespace' => 'Recruitment\Admin'], static function () {
    Route::get('/', 'RecruitmentController@index')->name('index')->middleware('permission:read-recruitment');
    Route::get('{id}', 'RecruitmentController@show')->name('show')->middleware('permission:read-recruitment');
});

