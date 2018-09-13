<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // User
    Route::resource('users', 'Admin\User\UsersController')->except(['destroy', 'show']);
    Route::get('users/delete/{user}', 'Admin\User\UsersController@destroy')->name('users.destroy');
    // Course
    Route::resource('courses', 'Admin\Course\CoursesController')->except(['show','destroy']);
    Route::get('courses/delete/{course}', 'Admin\Course\CoursesController@destroy')->name('courses.destroy');
    // TimeSlot
    Route::resource('timeslots', 'Admin\TimeSlot\TimeSlotsController')->except(['show','destroy']);
    Route::get('timeslots/delete/{timeslot}', 'Admin\TimeSlot\TimeSlotsController@destroy')->name('timeslots.destroy');
});
