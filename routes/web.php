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

Route::get('/Laravel', function () {
    return view('Post_view');
});

Route::get('/test', function () {
    return view('layouts.Web_app');
});

//Post Section
Route::prefix('/')->group(function () {
    Route::resource('Main', 'Web\Main\MainController');
    //Section
    Route::resource('Section', 'Web\Section\SectionController');
    Route::get('get_all_posts/{Section_id}', 'Web\Section\SectionController@get_all_posts')->name('Web.get_all_posts');
    //post
    Route::prefix('/Post')->group(function () {
        Route::resource('/', 'Web\Section\SectionController');
        Route::get('get_post/{post_id}', 'Web\Post\PostController@get_post')->name('Web.get_post');
        //
        Route::resource('/Comment', 'Web\Post\CommentController');
        Route::post('Comment/{post_id}', 'Web\Post\CommentController@post_comment')->name('Web.post_comment');

    });
});

//Admin Section
Route::prefix('Admin')->middleware('AdminPanel')->group(function () {
    Route::resource('Section', 'Admin\Section\SectionController')->middleware('AdminRole');
    Route::get('Section/Delete/{id}', 'Admin\Section\SectionController@delete')->name('Section.delete')->middleware('AdminRole');
    //Route::post('Delete/{id}','Admin\Section\SectionController@destroy');

    //Image
    Route::resource('Image', 'Admin\Images\ImageController');
    Route::get('Image/Delete/{id}', 'Admin\Images\ImageController@delete')->name('Image.delete');

    //Post
    Route::resource('Post', 'Admin\Post\PostController');
    Route::get('Post/Delete/{id}', 'Admin\Post\PostController@delete')->name('Post.delete');
});

Route::get('/Admin/Main', function () {
    return view('layouts/Admin_app');
});

Route::resource('Section', 'Web\Section\SectionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

