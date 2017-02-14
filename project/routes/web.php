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
    return view('users.login');
});
Route::get('/login', function () {
    return view('users.login');
});

// USER ROUTES
Route::get('/register','UsersController@getRegister');
Route::post('/register','UsersController@postRegister');
Route::post('/login','UsersController@postLogin');
Route::get('/logout','UsersController@getLogout');
/*Route::get('/home','UsersController@getHome');*/

// POST ROUTES
/*Route::get('/home',['uses' => 'PostsController@getHome']);*/
Route::get('/home',['uses' => 'PostsController@getHome',
					'middleware' => 'auth'
					]);
Route::get('/posts','PostsController@getPosts');
Route::post('/addPost', 'PostsController@addPost');

// COMMENT ROUTES
Route::post('/addComment', 'CommentsController@addComment');