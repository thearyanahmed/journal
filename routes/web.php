<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('doNotCacheResponse')->group(function(){

	Auth::routes(['register' => false]);

	Route::get('/', 'ArticleController@welcome');

	Route::resource('articles','ArticleController');

	Route::post('upload','ContentController@upload');
	Route::get('/archives', 'ContentController@archives')->name('archives');
	Route::get('/home', 'ContentController@home')->name('home');

// });
