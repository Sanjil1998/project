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
Auth::routes(['blog'=> false]);

// Frontend Routes

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('blogs')->group(function(){
    Route::get('/', 'HomeController@blogs')->name('home.blogs');
});

// Backend Routes

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');

    Route::get('/users','AdminController@users')->name('admin.users');


    // Profile Routes
    Route::prefix('profile')->group(function(){

        Route::get('/','ProfileController@index')->name('admin.profile.index');

        Route::get('/create_profile','ProfileController@create_profile')->name('admin.profile.create_profile');

        Route::post('/create_profile/save','ProfileController@store_profile')->name('admin.profile.store_profile');

        Route::get('/{id}/edit','ProfileController@update_profile')->name('admin.profile.update_profile');

        Route::put('/{id}/update','ProfileController@store_update_profile')->name('admin.profile.store_update_profile');

        Route::get('/files','ProfileController@file')->name('admin.profile.files');

        Route::post('/files/save','FileController@save')->name('admin.profile.files.save');

        Route::get('/files/download','FileController@download')->name('admin.profile.files.download');

        Route::DELETE('/files/{id}/destroy','FileController@destroy')->name('admin.profile.files.destroy');

        Route::get('/files/cv','FileController@cv')->name('admin.profile.files.cv');

        Route::get('/about', 'ProfileController@about')->name('admin.profile.about');

        Route::post('/about/store', 'ProfileController@store_about')->name('admin.profile.about.store');

        Route::get('/about/{id}/edit', 'ProfileController@edit_about')->name('admin.profile.about.edit');

        Route::put('/about/{id}/update', 'ProfileController@update_about')->name('admin.profile.about.update');

        Route::delete('/about/{id}/delete', 'ProfileController@delete_about')->name('admin.profile.about.delete');

        Route::post('/about/store_skills', 'ProfileController@store_skills')->name('admin.profile.about.store_skills');

        Route::get('/about/{id}/edit_skills', 'ProfileController@edit_skills')->name('admin.profile.about.edit_skills');

        Route::put('/about/{id}/update_skills', 'ProfileController@update_skills')->name('admin.profile.about.update_skills');

        Route::delete('/about/{id}/delete_skills', 'ProfileController@delete_skills')->name('admin.profile.about.delete_skills');

        Route::get('/contact', 'ProfileController@contact')->name('admin.profile.contact');

        Route::get('/work', 'ProfileController@work')->name('admin.profile.work');

        Route::get('/work/add', 'ProfileController@work_add')->name('admin.profile.work.add');

        Route::post('/work/store', 'ProfileController@work_store')->name('admin.profile.work.store');

        Route::get('/work/{id}/edit', 'ProfileController@work_edit')->name('admin.profile.work.edit');

        Route::put('/work/{id}/update', 'ProfileController@work_update')->name('admin.profile.work.update');

        Route::delete('/work/{id}/delete', 'ProfileController@delete_work')->name('admin.profile.work.delete');

        Route::get('/experience', 'ProfileController@experience')->name('admin.profile.experience');

        Route::get('/experience/add', 'ProfileController@experience_add')->name('admin.profile.experience.add');

        Route::post('/experience/store', 'ProfileController@experience_store')->name('admin.profile.experience.store');

        Route::get('/experience/{id}/edit', 'ProfileController@experience_edit')->name('admin.profile.experience.edit');

        Route::put('/experience/{id}/update', 'ProfileController@experience_update')->name('admin.profile.experience.update');

        Route::delete('/experience/{id}/delete', 'ProfileController@delete_experience')->name('admin.profile.experience.delete');


    });

    // Blogs Routes
    Route::prefix('blogs')->group(function(){

        Route::get('/','BlogController@index')->name('admin.blogs.index');

        Route::get('/create','BlogController@create')->name('admin.blogs.create');

        Route::get('/store','BlogController@store')->name('admin.blogs.store');


    });

    // Gallery Routes

    Route::prefix('gallery')->group(function(){
        Route::get('/', 'GalleryController@index')->name('admin.gallery.index');
    });


});

