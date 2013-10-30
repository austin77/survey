<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
*/

//Top level routes
Route::get('/', 'pages@index');
Route::get('about', 'pages@contact');
Route::get('contact', 'pages@contact');
Route::post('contact', 'pages@send_message');
Route::get('how-it-works', 'pages@features');
Route::get('privacy', 'pages@privacy');
Route::get('tos', 'pages@tos');

//Survey
Route::get('survey', 'pages@survey');
Route::post('survey/answer', 'survey@answer');
Route::get('survey/complete', 'survey@complete');

//Admin routes
Route::get('admin', 'admin.home@index');

Route::get('admin/questions', 'admin.questions@index');

Route::get('admin/questions/add', 'admin.questions@showForm');
Route::post('admin/questions/add', 'admin.questions@add');
Route::post('admin/questions/update/(:num)', 'admin.questions@update');

Route::get('admin/questions/delete/(:num)', 'admin.questions@delete');

Route::get('admin/questions/edit/(:num)', 'admin.questions@showForm');

Route::get('admin/analyse', 'admin.analytics@index');
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});