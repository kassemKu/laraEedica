<?php
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
// Route::get('/', function () {
//     return view('client.welcome');
// });

Route::get('/', 'WelcomeController@frontPage');
Route::get('/courses', 'WelcomeController@courses')->name('client.courses');

// Test Queue IN server REMOVE IT leater
Route::get('check-queueu', function() {
    Mail::to('kassemKu2010@gmail.com')->send(new TestMail());
    return 'Its DONE';
});

Auth::routes();

Route::prefix('manage')
    ->middleware('role:superadministrator|administrator|editor|author|contributor|teacher')
    ->group(function () {
        Route::get('/', 'Manage\ManageController@index');
        Route::get('/dashboard', 'Manage\ManageController@dashboard')
            ->name('manage.dashboard');
        Route::resource('/users', 'Manage\UsersController');
        Route::resource('/roles', 'Manage\RolesController');
        Route::resource('/permissions', 'Manage\PermissionsController');

        Route::resource('/courses', 'Manage\CoursesController');

        Route::resource('/lessons', 'Manage\LessonsController');
        Route::get('/course/{course_id}/lessons/create', 'Manage\LessonsController@create')->name('lessons.create');
});

Route::resource('profile', 'Auth\ProfileController');

Route::get('/home', 'HomeController@index')->name('home');
