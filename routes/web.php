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
Auth::routes();
Route::get('/login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('/login/{service}/callback', 'Auth\SocialLoginController@callback');

Route::get('/', 'PagesController@index')->name('welcome');
Route::get('/categories', 'PagesController@categories')->name('categories');
Route::get('/categories/{categories}/photos', 'PagesController@photos')->name('categories.photos');
Route::get('/contact-us', 'PagesController@contact')->name('contact');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/policy', 'PagesController@policy')->name('policy');
Route::get('testimonials', 'TestimonialController@index')->name('testimonials');
Route::post('testimonials', 'TestimonialController@store')->name('testimonials.store');






Route::post('send', 'QuoteController@send')->name('send');

/**
 * Admin Seciton
 */
Route::group(['middleware' => ['auth'] , 'namespace' => 'Admin', 'as' => 'admin.'], function (){

	/**
	 * Admin
	 */
	Route::get('admin', 'AdminController@index')->name('main.index');
	/**
	 * Photos
	 */
	// Route::resource('admin/photos', 'PhotoController');

	Route::group(['middleware' => ['roles:admin']], function(){

		Route::get('admin/photos', 'PhotoController@index')->name('photos.index');
		Route::post('admin/photos/{category}/', 'PhotoController@store')->name('photos.store');
		Route::delete('admin/photos/{category}/', 'PhotoController@destroy')->name('photos.destroy');

		Route::get('admin/categories/create', 'CategoriesController@create')->name('categories.create');
		Route::post('admin/categories', 'CategoriesController@store')->name('categories.store');
		Route::get('admin/categories/{categories}/edit', 'CategoriesController@edit')->name('categories.edit');
		Route::delete('admin/categories/{categories}', 'CategoriesController@destroy')->name('categories.destroy');
		Route::patch('admin/categories/{categories}', 'CategoriesController@update')->name('categories.update');
	});


});
