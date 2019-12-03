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
    return view('home');
});

/* POSTS */
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
Route::get('/user/{user}/posts', 'PostController@showPostsForUser')->name('user.posts.show');

/* COMMENTS */
Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');

/* TAGS */
Route::get('/posts/tags/{tag}', 'TagController@index')->name('tags.index');
Route::post('/tags', 'TagController@store')->name('tags.store');

/* USERS
// prikaži sve usere
Route::get('/users', 'UserController@index')->name('users.index');
// prikaži formu za stvaranje novog usera
Route::get('/users/create', 'UserController@create')->name('users.create');
// spremi novo kreiranog usera u bazu
Route::post('/users', 'UserController@store')->name('users.store');
// prikaži jednog usera
Route::get('/users/{user}', 'UserController@show')->name('users.show');
// prikaži formu za uređivanje usera
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
// spremi uređenog usera u bazu
Route::patch('/users/{user}', 'UserController@update')->name('users.update');
// obriši usera
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
*/
Route::resource('/users', 'UserController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
