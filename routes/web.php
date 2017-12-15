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

Route::post('kkic', 'KkicController@store')->name('kkicstore');

Route::get('kkic/invites', 'KkicController@invites')->name('invites');

Route::get('kkic/invites/redeem/{affiliate}/{coupon}', 'KkicController@redeem')->name('redeem');



