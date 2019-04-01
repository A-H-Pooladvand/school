<?php

Route::group(['prefix' => 'enrollments', 'as' => 'enrollment.', 'namespace' => 'Enrollment\Admin'], function () {

    Route::get('/', 'EnrollmentController@index')->name('index')->middleware('permission:read-enrollment');
    Route::post('items', 'EnrollmentController@items')->name('items')->middleware('permission:read-enrollment');
    Route::get('{id}', 'EnrollmentController@show')->name('show')->middleware('permission:read-enrollment');
    Route::delete('{id}', 'EnrollmentController@destroy')->name('destroy')->middleware('permission:read-enrollment');

});

