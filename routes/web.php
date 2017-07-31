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
Route::get('usluga/{alias}','PageController@uslugaItem')->name('usluga.item');



Route::group(['prefix' => 'admincp', 'middleware' => ['role:admin', 'auth']], function () {
   Route::get('/', 'AdminController@index')->name('admin.index');
   Route::resource('usluga', 'Admin\UslugaController');
   Route::resource('slider', 'Admin\SliderController');
   Route::get('sitemap', 'Admin\SitemapController@get')->name('sitemap');
   Route::group(['prefix' => 'about'], function (){
      Route::get('/', 'Admin\AboutController@get')->name('about.get');
      Route::patch('/', 'Admin\AboutController@post')->name('about.post');
   });
   Route::group(['prefix' => 'setting'], function (){
       Route::get('/', 'Admin\SettingController@index')->name('setting.index');
       Route::get('edit/{id}', 'Admin\SettingController@edit')->name('setting.edit');
       Route::patch('edit/{id}', 'Admin\SettingController@update')->name('setting.update');
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
