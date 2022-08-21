<?php

use App\Http\Controllers\BlogController;
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
Route::get('clear', function () {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('route:clear');
	Artisan::call('config:cache');
});

Auth::routes(['register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...);
  ]);
Auth::routes(['blog'=> false]);


// Frontend Routes

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('blogs')->group(function(){
    Route::get('/', 'HomeController@blogs')->name('home.blogs');
});

Route::get('gallery', 'GalleryController@home')->name('gallery.home');

Route::get('experience', 'HomeController@experience')->name('experience.index');

Route::get('work', 'HomeController@work')->name('work.index');

Route::get('blog', 'HomeController@blog')->name('blog.index');

Route::get('blog/{id}', 'HomeController@blogView')->name('blog.blogShow');

// Backend Routes

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');

    Route::get('/users','AdminController@users')->name('admin.users');

    Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword.index');

    Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');


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

        Route::get('/blog-list', 'BlogController@blogList')->name('admin.blogs.blogList');

        Route::get('/create','BlogController@create')->name('admin.blogs.create');

        Route::post('/store','BlogController@store')->name('admin.blogs.store');

        Route::get('/{id}', 'BlogController@show')->name('admin.blogs.show');

        Route::get('/{id}/edit', 'BlogController@edit')->name('admin.blogs.edit');

        Route::put('/{id}/update','BlogController@update')->name('admin.blogs.update');

        Route::delete('/{id}/delete', 'BlogController@destroy')->name('admin.blogs.delete');


    });

    // Gallery Routes

    Route::prefix('gallery')->group(function(){
        Route::get('/', 'GalleryController@index')->name('admin.gallery.index');
        Route::get('/create', 'GalleryController@create')->name('admin.gallery.create');
        Route::post('/store', 'GalleryController@store')->name('admin.gallery.store');
        Route::delete('/{id}/delete', 'GalleryController@delete')->name('admin.gallery.delete');

        // Banner Routes

        Route::get('/banner', 'GalleryController@banner')->name('admin.gallery.banner.index');
        Route::get('/banner/create', 'GalleryController@banner_create')->name('admin.gallery.banner.create');
        Route::post('/banner/store', 'GalleryController@banner_store')->name('admin.gallery.banner.store');
        Route::delete('/banner/{id}/delete', 'GalleryController@banner_delete')->name('admin.gallery.delete');
    });


});

