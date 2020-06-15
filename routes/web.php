<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes(['register'=> false]);

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');

    Route::get('/users','AdminController@users')->name('admin.users');

    Route::get('/profile','ProfileController@index')->name('admin.profile.index');

    Route::get('/profile/files','ProfileController@file')->name('admin.profile.files');

    Route::post('/profile/files/save','FileController@save')->name('admin.profile.files.save');

    Route::get('/profile/files/download','FileController@download')->name('admin.profile.files.download');

    Route::DELETE('/profile/files/{id}/destroy','FileController@destroy')->name('admin.profile.files.destroy');

    Route::get('/profile/files/cv','FileController@cv')->name('admin.profile.files.cv');

    Route::get('/blogs','BlogController@index')->name('admin.blogs.index');

    Route::get('/blogs/create','BlogController@create')->name('admin.blogs.create');

    Route::prefix('profile')->group(function(){

        Route::get('/about', 'ProfileController@about')->name('admin.profile.about');

        Route::post('/about/store', 'ProfileController@store_about')->name('admin.profile.about.store');

        Route::get('/about/{id}/edit', 'ProfileController@edit_about')->name('admin.profile.about.edit');

        Route::put('/about/{id}/update', 'ProfileController@update_about')->name('admin.profile.about.update');

        Route::delete('/about/{id}/delete', 'ProfileController@delete_about')->name('admin.profile.about.delete');

    });
});

Route::get('/blogs', 'HomeController@blogs')->name('home.blogs');
