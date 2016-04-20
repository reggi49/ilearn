<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/', ['uses' => 'LoginController@index', 'as' => 'login']);
Route::post('/auth/login', ['uses' => 'LoginController@login', 'as' => 'auth.login']);
Route::get('/auth/logout', ['uses' => 'LoginController@logout', 'as' => 'auth.logout']);

Route::match(['put', 'patch'], '/auth/profile', ['uses' => 'LoginController@update', 'middleware' => ['auth', 'role:teacher|student'], 'as' => 'auth.update']);
Route::match(['put', 'patch'], '/auth/password', ['uses' => 'LoginController@passwordUpdate', 'middleware' => ['auth', 'role:teacher|student'], 'as' => 'auth.updatepassword']);
Route::match(['put', 'patch'], '/auth/image', ['uses' => 'LoginController@changeImage', 'middleware' => ['auth', 'role:teacher|student'], 'as' => 'auth.image']);

Route::get('/password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'email.request']);
Route::post('/password/email', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'email.store']);
Route::get('/password/reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'reset.request']);
Route::post('/password/reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'reset.store']);

Route::group(['prefix' => '/lms-admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:staff']], function () {
	Route::get('/', ['uses' => 'HomeController@index', 'as' => 'lms-admin.index'] );
	Route::get('/profile',['uses' => 'HomeController@profile', 'as' => 'lms-admin.profile']);
	
	Route::resource('/users', 'UserController', ['except' => 'show']);
	Route::resource('/majors', 'MajorController', ['except' => 'show']);
	Route::resource('/subjects', 'SubjectController', ['except' => 'show']);
	Route::resource('/announcements', 'AnnouncementController', ['except' => 'show']);
	Route::resource('/classrooms', 'ClassroomController', ['except' => 'show']);
	Route::post('/classrooms/addmembers', ['uses' => 'ClassroomController@addMembers', 'as' => 'lms-admin.classrooms.addmembers']);
	Route::delete('/classrooms/removemember/{users}', ['uses' => 'ClassroomController@removeMember', 'as' => 'lms-admin.classrooms.removemember']);
});

Route::group(['namespace' => 'User', 'middleware' => ['auth', 'role:teacher|student']], function () {
	Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home.index']);
	Route::get('/profile',['uses' => 'HomeController@profile', 'as' => 'home.profile']);
	Route::get('/password', ['uses' => 'HomeController@password', 'as' => 'home.password']);

	Route::get('/libraries/assignments', ['uses' => 'HomeController@assignments', 'as' => 'home.assignments']);
	Route::get('/libraries/quiz', ['uses' => 'HomeController@quizes', 'as' => 'home.quizes']);

	Route::get('/calendar', ['uses' => 'HomeController@calendar', 'as' => 'home.calendar']);

	Route::resource('/announcements', 'AnnouncementController', ['only' => ['index']]);

	Route::get('/classrooms/{classrooms}', ['uses' => 'ClassroomController@show', 'as' => 'classrooms.show']);
	Route::get('/classrooms/{classrooms}/courses', ['uses' => 'ClassroomController@courses', 'as' => 'classrooms.courses']);
	Route::get('/classrooms/{classrooms}/assignments', ['uses' => 'ClassroomController@assignments', 'as' => 'classrooms.assignments']);
	Route::get('/classrooms/{classrooms}/quizes', ['uses' => 'ClassroomController@quizes', 'as' => 'classrooms.quizes']);
	Route::get('/classrooms/{classrooms}/members', ['uses' => 'ClassroomController@members', 'as' => 'classrooms.members']);
	Route::get('/classrooms/download/{filename}', ['uses' => 'ClassroomController@download', 'as' => 'classrooms.download']);


	Route::resource('/discuss', 'DiscussionController', ['only' => ['store', 'destroy']]);
	Route::resource('/assignments', 'AssignmentController', ['except' => ['create']]);
	Route::post('/createsubmission/{assignment}', ['uses' => 'AssignmentController@createsubmission', 'as' => 'createsubmission']);
	Route::resource('/quizes', 'QuizController');
});