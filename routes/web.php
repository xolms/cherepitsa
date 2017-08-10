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

Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about')->name('about.index');
Route::get('usluga', 'PageController@usluga')->name('uslugi.index');
Route::get('events', 'PageController@events')->name('event.index');
Route::get('production', 'PageController@product')->name('product.index');
Route::get('usluga/{alias}','PageController@uslugaItem')->name('usluga.item');



Route::group(['prefix' => 'admincp', 'middleware' => ['role:admin', 'auth']], function () {
   Route::get('/', 'AdminController@index')->name('admin.index');
   Route::resource('usluga', 'Admin\UslugaController');
   Route::resource('slider', 'Admin\SliderController');
   Route::resource('setting' , 'Admin\SettingController');
   Route::resource('events', 'Admin\EventsController');
   Route::resource('works', 'Admin\WorksController');
   Route::post('events/all', 'Admin\EventsController@deleteAll')->name('events.all');
   Route::get('sitemap', 'Admin\SitemapController@get')->name('sitemap');
   Route::group(['prefix' => 'about'], function (){
      Route::get('/', 'Admin\AboutController@get')->name('about.get');
      Route::patch('/', 'Admin\AboutController@post')->name('about.post');
   });
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
Route::group(['middleware' => 'auth'], function (){
    Route::post('logout',['as'=>'logout', 'uses' => 'Auth\LoginController@logout']);
});
