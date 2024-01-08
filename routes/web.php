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

/* administrador */

/* admins ------------------------------------------------------------*/
//Route::get('admin/inicio', 'homeController@admin')->middleware('Admin');
Route::get('admin/admins/', 'adminController@index')->middleware('Admin');
//Route::resource('admin/admins/','userController');
Route::post('admin/admins/store', 'adminController@store')->middleware('Admin');
Route::get('admin/admins/create', 'adminController@create')->middleware('Admin');
Route::post('admin/admins/{id}/update','adminController@update')->middleware('Admin');
Route::get('admin/admins/{id}/destroy','adminController@destroy')->middleware('Admin');
Route::get('admin/admins/{id}/edit','adminController@edit')->middleware('Admin');
Route::post('admin/admins/{id}/update','adminController@update')->middleware('Admin');
Route::post('admin/admins/busca','adminController@busca')->middleware('Admin');

/* users-------------------------------------------------------------------*/
Route::get('admin/users/','userController@index')->middleware('Employer');
Route::get('admin/users/create','userController@create')->middleware('Admin');
Route::post('admin/users/store', 'userController@store')->middleware('Admin');
Route::get('admin/users/{id}/edit','userController@edit')->middleware('Admin');
Route::post('admin/users/{id}/update','userController@update')->middleware('Admin');
Route::get('admin/users/{id}/destroy','userController@destroy')->middleware('Admin');
Route::post('admin/users/busca','userController@busca')->middleware('Admin');

/* employers---------------------------------------------------------------------------*/
Route::get('admin/employers/create','employerController@create')->middleware('Admin');
Route::post('admin/employers/store','employerController@store')->middleware('Admin');
Route::get('admin/employers/','employerController@index')->middleware('Employer');
Route::get('admin/employers/{id}/edit','employerController@edit')->middleware('Admin');
Route::post('admin/employers/{id}/update','employerController@update')->middleware('Admin');
Route::get('admin/employers/{id}/destroy','employerController@destroy')->middleware('Admin');
Route::post('admin/employers/busca','employerController@busca')->middleware('Admin');

/* services---------------------------------------------------------------------------*/
Route::get('admin/services/create','servicesController@create')->middleware('Employer');
Route::post('admin/services/store','servicesController@store')->middleware('Employer');
Route::get('admin/services/','servicesController@index')->middleware('Employer');
Route::post('admin/services/busca','servicesController@busca')->middleware('Employer');
Route::get('admin/services/{id}/destroy','servicesController@destroy')->middleware('Employer');
Route::get('admin/services/{id}/edit','servicesController@edit')->middleware('Employer');
Route::post('admin/services/{id}/update','servicesController@update')->middleware('Employer');

/* forum---------------------------------------------------------------------------*/
Route::get('admin/forum/create','forumController@create')->middleware('Admin');
Route::post('admin/forum/store','forumController@store')->middleware('Admin');
Route::get('admin/forum/','forumController@index')->middleware('Admin');
Route::get('admin/forum/{id}/destroy','forumController@destroy')->middleware('Admin');
Route::get('admin/forum/{id}/edit','forumController@edit')->middleware('Admin');
Route::post('admin/forum/{id}/update','forumController@update')->middleware('Admin');
Route::post('admin/forum/busca','forumController@busca')->middleware('Admin');

/* Message---------------------------------------------------------------------------*/
//Route::get('admin/message/create','messageController@create')->middleware('Admin');
Route::get('admin/message/','messageController@index')->middleware('Admin');
Route::get('admin/message/{id}/view','messageController@view')->middleware('Admin');
Route::post('admin/message/busca','messageController@busca')->middleware('Admin');


/* Imovel---------------------------------------------------------------------------*/
//Route::get('admin/residences/','residenceController@index')->middleware('Admin');
//Route::get('admin/residences/create','residenceController@create')->middleware('Admin');
//Route::get('admin/residences/{id}/edit','residenceController@edit')->middleware('Admin');
//Route::post('admin/residences/store','residenceController@store')->middleware('Admin');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
