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

// Route::get('/', function () {
//     return view('pages/home');
// });

Route::get('/', 'PagesController@index');

Route::get('/play/{id}', 'PagesController@play')->name('play');
Route::post('/play/answer', 'PagesController@answer')->name('answer');

Route::get('/thanks', 'PagesController@thanks')->name('thanks');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');
Route::post('/admin/newCompetition', 'AdminController@newCompetition')->name('newCompetition')->middleware('auth');
Route::delete('/admin/contestant/{id}', 'AdminController@delete')->middleware('auth');

Auth::routes();


