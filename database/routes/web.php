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

Route::get('/', [
	'uses' => 'PostController@getIndex',
	'as' => 'blogIndex'
]);
Route::get('/post/{id}',[
	'uses' => 'PostController@getPost',
	'as' => 'blogPost']);

Route::group([
	'prefix' => 'admin'
], function(){

	Route::get('', [
		'uses' => 'PostController@getAdminIndex',
		'as' => 'adminIndex'
	]);

	Route::get('create',[
		'uses' => 'PostController@getAdminCreate',
		'as' => 'adminCreate'
	]);

	Route::post('create',  [
		'uses' => 'PostController@postAdminCreate',
		'as' => 'adminCreate'
	]);

	Route::get('/edit/{id}', [
		'uses' => 'PostController@getAdminEdit',
		'as' => 'adminEdit'
	]);

	Route::post('edit',  [
		'uses' => 'PostController@postAdminUpdate',
		'as' => 'adminUpdate'
	]);
});




