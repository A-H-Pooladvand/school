<?php

Route::group(['prefix' => 'recruitment', 'as' => 'recruitment.', 'namespace' => 'Recruitment\Front'], static function () {
    Route::get('/', 'RecruitmentController@create')->name('create');
    Route::post('/', 'RecruitmentController@store')->name('store');
});