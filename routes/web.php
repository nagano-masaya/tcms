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
Route::post('depositdetail', 'PagesController@depositdetailSave')->middleware('auth');

Route::get('orderlist', 'PagesController@orderlist')->middleware('auth');
Route::get('orderdetail', 'PagesController@orderdetail')->middleware('auth');
Route::post('orderdetail', 'PagesController@orderdetailPost')->middleware('auth');

Route::get('paymentlist', 'PagesController@paymentlist')->middleware('auth');
Route::get('paymentdetail', 'PagesController@paymentdetail')->middleware('auth');
Route::post('peymanetdetail', 'PagesController@paymentdetailPost')->middleware('auth');


Route::get('diary', 'PagesController@diary')->middleware('auth');
Route::post('diary', 'PagesController@diaryPost')->middleware('auth');
Route::post('listdaily', 'listController@listdaily')->middleware('auth');

Route::get('ballancesheet', 'PagesController@ballancesheet')->middleware('auth');
Route::get('pdftest.pdf', 'PdfController@pdftest')->middleware('auth');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::post('listpersons', 'listController@listpersons');
Route::post('listconstructs','listController@listconstructs');
Route::post('listunits','listController@listunits');
Route::post('listitemsac','listcontroller@listitemsac');

/**/
Route::get('upload', 'fileController@check');
Route::post('upload', 'fileController@upload');
