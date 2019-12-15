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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('contruct', 'PagesController@contruct')->middleware('auth');
Route::get('contdetaile', 'PagesController@contDetaile')->middleware('auth');
Route::post('contdetaile', 'PagesController@conDetailSave')->middleware('auth');
Route::get('constdetaile', 'PagesController@constDetaile')->middleware('auth');
Route::get('claimlist', 'PagesController@claimlist')->middleware('auth');
Route::get('claimdetail', 'PagesController@claimdetail')->middleware('auth');
Route::post('claimdetail', 'PagesController@claimdetailSave')->middleware('auth');
Route::get('deposits', 'PagesController@deposits')->middleware('auth');
Route::get('depositdetail', 'PagesController@depositdetail')->middleware('auth');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
