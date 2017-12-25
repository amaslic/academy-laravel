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

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('kkic', 'KkicController@create')->name('kkic');

Route::get('kkic/logout', 'NoPassAuthController@logout')->name('kkiclogout');

Route::post('kkic', 'KkicController@store')->name('kkicstore');

Route::get('kkic/invites', 'KkicController@invites')->name('invites');

Route::get('kkic/invitation/{id}', 'KkicController@invitation')->name('invitation');

Route::get('kkic/follow/{id}', 'KkicController@follow')->name('follow');

Route::get('order', 'KkicController@order')->name('order');

Route::get('kkic/invites/redeem/{affiliate}/{coupon}', 'KkicController@redeem')->name('redeem');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/subscribe', 'HomeController@subscribe');

Route::get('/auth', 'NoPassAuthController@index')->name('nopassauth');
Route::post('/auth', 'NoPassAuthController@auth')->name('nopassauth');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resources([
    '/affiliates' => 'AffiliaterController',
    '/coupons' => 'CouponController',
]);
