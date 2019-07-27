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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/about-qurbani', 'PagesController@about_qurbani');
Route::get('/contact', 'PagesController@contact');

Route::resource('/query', 'QueryController');

Route::get('/occasion/eid-special', 'EventsPageController@eid_special');
Route::get('/occasion/bakri-eid-special', 'EventsPageController@bakri_eid_special');
Route::get('/occasion/aqeeqa-special', 'EventsPageController@aqeeqa_special');
Route::get('/occasion/sadqa-special', 'EventsPageController@sadqa_special');

Route::get('/bakra/{name}', 'BakrasController@getData');

Auth::routes(['verify' => true]);

Route::post('/order/payment_check', 'OrderController@payment_check')->name('order.check');
Route::get('/order/confirmation', 'OrderController@confirmation');
Route::resource('/order', 'OrderController');

Route::prefix('/user')->group(function () {
    Route::middleware(['verified'])->group(function() {
        Route::get('/dashboard', 'UserDashboardController@dashboard');
        Route::resource('/profile', 'ProfileController');
        Route::resource('/cart', 'CartController');
    });
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::resource('/order', 'OrderController');
    Route::resource('/product', 'ProductController');
    Route::resource('/breed', 'BreedController');
    Route::resource('/event', 'EventController');
    Route::get('/query', 'QueryController@index');
});