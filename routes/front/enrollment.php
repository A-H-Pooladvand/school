<?php

Route::group(['prefix' => 'enrollments', 'as' => 'enrollment.', 'namespace' => 'Enrollment\Front'], function () {

    Route::get('create', 'EnrollmentController@create')->name('create');
    Route::post('/', 'EnrollmentController@store')->name('store');

});
