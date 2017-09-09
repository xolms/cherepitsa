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

Route::get('/', 'PageController@index')->name('index');
Route::get('pdf-personal', 'PdfController@pers')->name('pdf.pers');
Route::get('pdf-confidentiality', 'PdfController@conf')->name('pdf.conf');
Route::get('about', 'PageController@about')->name('about.index');
Route::get('contacts', 'PageController@contacts')->name('contact.index');
Route::get('usluga', 'PageController@usluga')->name('uslugi.index');
Route::get('events', 'PageController@events')->name('event.index');
Route::post('post/alltext', 'PageController@allText')->name('page.alltext');
Route::get('production', 'ProductController@product')->name('products.index');
Route::get('category/{category}', 'ProductController@productCategory')->name('product.category');
Route::get('maker/{maker}', 'ProductController@productMaker')->name('product.maker');
Route::get('category/{category}/{product}', 'ProductController@productCatProduct')->name('product.catproduct');
Route::get('maker/{maker}/{product}', 'ProductController@productMakerProduct')->name('product.makerproduct');
Route::get('works', 'PageController@works')->name('work.index');
Route::get('works/{category?}', 'PageController@workCategory')->name('work.category');
Route::get('works/{category?}/{alias?}', 'PageController@workItem')->name('work.alias');
Route::get('usluga/{alias}','PageController@uslugaItem')->name('usluga.item');
Route::post('post/contacts', 'FormController@contacts')->name('form.contacts');
Route::post('post/zamer', 'FormController@zamer')->name('form.zamer');
Route::post('post/usluga', 'FormController@usluga')->name('form.usluga');
Route::post('post/buy', 'FormController@buy')->name('form.buy');



Route::group(['prefix' => 'admincp', 'middleware' => ['role:admin', 'auth']], function () {
   Route::get('/', 'AdminController@index')->name('admin.index');
   Route::resource('usluga', 'Admin\UslugaController');
   Route::resource('slider', 'Admin\SliderController');
   Route::resource('setting' , 'Admin\SettingController');
   Route::resource('events', 'Admin\EventsController');
   Route::resource('works', 'Admin\WorksController');
   Route::resource('category', 'Admin\CategoryController');
   Route::resource('maker', 'Admin\MakerController');
   Route::resource('meta', 'Admin\MetaController');
   Route::resource('product', 'Admin\ProductController');
   Route::post('product/ajaxall', 'Admin\ProductController@ajaxAll')->name('product.ajax');
   Route::post('events/all', 'Admin\EventsController@deleteAll')->name('events.all');
   Route::resource('review', 'Admin\ReviewController');
   Route::patch('review/{id}/status', 'Admin\ReviewController@status')->name('review.status');
   Route::get('sitemap', 'Admin\SitemapController@get')->name('sitemap');
   Route::get('clearcache','AdminController@clear')->name('clearcache');
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
