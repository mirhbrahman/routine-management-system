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

Route::get('/', 'PublicHomeController@index')->name('public.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    // User
    Route::resource('users', 'Admin\User\UsersController')->except(['destroy', 'show']);
    Route::get('users/delete/{user}', 'Admin\User\UsersController@destroy')->name('users.destroy');
    // Course
    Route::resource('courses', 'Admin\Course\CoursesController')->except(['show','destroy']);
    Route::get('courses/delete/{course}', 'Admin\Course\CoursesController@destroy')->name('courses.destroy');
    // TimeSlot
    Route::resource('timeslots', 'Admin\TimeSlot\TimeSlotsController')->except(['show','destroy']);
    Route::get('timeslots/delete/{timeslot}', 'Admin\TimeSlot\TimeSlotsController@destroy')->name('timeslots.destroy');
    // Room
    Route::resource('rooms', 'Admin\Room\RoomsController')->except(['show', 'destroy']);
    Route::get('rooms/delete/{room}', 'Admin\Room\RoomsController@destroy')->name('rooms.destroy');
    // Session
    Route::resource('session', 'Admin\Session\SessionController')->except(['show','edit', 'create', 'destroy']);
    // Teacher Assign
    Route::resource('teacher-assigns', 'Admin\TeacherAssign\TeacherAssignsController')->except(['show', 'destroy']);
    Route::get('teacher-assign/delete/{teacherAssign}', 'Admin\TeacherAssign\TeacherAssignsController@destroy')->name('teacher-assigns.destroy');
    Route::get('teacher-assign/sem/{sem}', 'Admin\TeacherAssign\TeacherAssignsController@getBySem')->name('teacher-assigns.getBySem');
    // Routine
    Route::resource('routine', 'Admin\Routine\RoutineController')->except(['show', 'update','show','destroy']);
    Route::post('routine-u/update', 'Admin\Routine\RoutineController@update')->name('routine.update');
    Route::get('routine/delete/{id}', 'Admin\Routine\RoutineController@destroy')->name('routine.destroy');
    // Routine PDF download
    Route::get('routine-apdf/admin/download', 'Admin\PDF\PDFRoutineController@index')->name('pdf.full_routine.index');
    // Teacher routine
    Route::get('teacher-routine', 'Admin\TeacherRoutine\TeacherRoutinesController@index')->name('admin.teacher_routine.index');
    Route::get('teacher-routine/show/{id}', 'Admin\TeacherRoutine\TeacherRoutinesController@show')->name('admin.teacher_routine.show');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    // Profile
    Route::get('profile', 'User\ProfileController@edit')->name('user.profile.edit');
    Route::put('profile', 'User\ProfileController@update')->name('user.profile.update');
});

Route::group(['prefix' => 'teacher', 'middleware' => ['auth']], function () {
    // Routine
    Route::get('routine', 'Teacher\Routine\RoutineController@index')->name('teacher.routine.index');
    // Routine PDF download
    Route::get('routine-tpdf/teacher/download/{id}', 'Teacher\PDF\PDFRoutineController@index')->name('pdf.teacher_routine.index');
});
// Public Routine PDF download
Route::get('routine-ppdf/sem/download', 'PublicRoutine\PDF\PDFRoutineController@index')->name('pdf.public_routine.index');
