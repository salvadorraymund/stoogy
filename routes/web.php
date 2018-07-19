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

Route::get('/', 'PagesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events', 'EventsController@index')->name('events.index');
Route::post('/events', 'EventsController@addEvent')->name('events.add');
Route::get('/events/show', 'EventsController@show')->name('events.show');
// Route::get('/events/showEvent', 'EventsController@showEvent')->name('events.view');
Route::get('/events/genMeet', 'EventsController@genMeet')->name('events.genMeet');
Route::resource('events/adjust', 'AdjustController');


Route::resource('/profiles', 'ProfilesController');
// Route::get('/profiles/{profile}/alter', 'ProfilesController@edit')->name('profiles.alter');

// Route::resource('/queries', 'QueriesController');


Route::prefix('manage')->group(function () {
	Route::get('/login', 'Auth\ManageLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\ManageLoginController@login')->name('admin.login.submit');
	Route::get('/', 'ManageController@index')->name('manage.dashboard');

	Route::resource('/profiles', 'ManageProfilesController');


	Route::resource('/events', 'ManageEventsController');
	Route::get('/schedule', 'ScheduleController@schedule')->name('events.schedule');
	Route::post('/schedule', 'ScheduleController@addEvent')->name('schedule.add');
	Route::get('/appointment', 'ScheduleController@show')->name('manage.events.schedule-show');

	// Route::resource('/queries', 'ManageQueriesController');
	// Route::resource('/queries/view', 'ViewMessageController');

	
});


Route::resource('/users', 'UserController');







