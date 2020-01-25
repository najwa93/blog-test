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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/Laravel', function () {
    return view('Post_view');
});

Route::get('/test', function () {
    return view('layouts.Web_app');
});
Route::prefix('/')->group(function () {
    Route::resource('/Main', 'Web\Main\MainController');
});

Route::prefix('Admin')->middleware('Admin')->group(function () {
    Route::resource('Section', 'Admin\Section\SectionController');
    Route::get('Section/Delete/{id}', 'Admin\Section\SectionController@delete')->name('Section.delete');
    //Route::post('Delete/{id}','Admin\Section\SectionController@destroy');

    //Image
    Route::resource('Image', 'Admin\Images\ImageController');
    Route::get('Image/Delete/{id}', 'Admin\Images\ImageController@delete')->name('Image.delete');
});





Route::get('/Admin/Main', function () {
    return view('layouts/Admin_app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

