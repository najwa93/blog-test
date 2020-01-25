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

Route::prefix('Admin')->group(function () {
    Route::resource('Section', 'Admin\Section\SectionController');
    Route::get('Delete/{id}', 'Admin\Section\SectionController@delete');
    //Route::post('Delete/{id}','Admin\Section\SectionController@destroy');

    //Image
    Route::resource('Image', 'Admin\Images\ImageController');
   // Route::get('Delete/{id}', 'Admin\Section\SectionController@delete');
});





Route::get('/Admin/Main', function () {
    return view('layouts/Admin_app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

