<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'admin'], function (){

    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController' );
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/user','UsersController');
    Route::resource('admin/role','RoleController');
    Route::resource('admin/permissions','PermissionController');
    Route::resource('admin/profile','Profile');
    Route::get('admin/unauthorised','HomeController@unauthorised');
    Route::resource('admin/banner','Banners');
    Route::resource('admin/service','ServiceController');
    Route::resource('admin/csd','CasestudyController');
    Route::resource('admin/offer','OffersController');
    Route::resource('admin/seo','SeoController');
    Route::resource('admin/settings','SettingsController');
    Route::resource('admin/about','AboutController');
    Route::resource('admin/features','FeaturesController');
    Route::resource('admin/locations','LocationsController');
    Route::resource('admin/properties','PropertyController');
    Route::resource('admin/testimonials','ReviewController');
    Route::resource('admin/portfolios','PortfolioController');
    Route::resource('admin/members','TeamController');
    Route::get('admin/upload-images', 'DropzoneController@dropzone');
    Route::get('admin/images', 'DropzoneController@images');
    Route::post('admin/images/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');
    Route::post('admin/images/delete', 'DropzoneController@dropzoneDelete')->name('dropzone.delete');



});

Route::group(['namespace' => 'user'], function(){

    Route::get('/','HomeController@home');
    Route::get('/blog','HomeController@blog');
    Route::get('/properties','HomeController@properties');
    Route::get('/new-developments','HomeController@developments');
    Route::get('/about-us','HomeController@about');
    Route::get('/contact-us','HomeController@contact');
    Route::get('blog/{post}','HomeController@post')->name('post');
    Route::get('property/{property}','HomeController@property')->name('property');
    Route::get('location/{location}','HomeController@location')->name('location');
    Route::get('offers/','HomeController@offers');
    Route::get('portfolio/','HomeController@portfolio');
    Route::get('offer/{offer}','HomeController@offer')->name('offer');
    Route::get('service/{service}','HomeController@service')->name('service');
    Route::get('blog/category/{category}','HomeController@category')->name('category');
    Route::get('blog/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('search','HomeController@search')->name('search');
    Route::get('buy','HomeController@buy');
    Route::get('rent','HomeController@rent');

});

Auth::routes(['verify' => true]);
Route::get('/home', 'admin\HomeController@index')->name('admin.home');
Route::resource('enquiry','EnquiryController');

/* Sitemap Routes*/
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.xml');
Route::get('/sitemap.xml/post', 'SitemapController@posts');
Route::get('/sitemap.xml/offer', 'SitemapController@offers');
Route::get('/sitemap.xml/service', 'SitemapController@services');





