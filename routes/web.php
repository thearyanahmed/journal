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

Auth::routes();

Route::get('/', 'ContentController@index');
Route::get('/read/{article}', 'ContentController@index')->name('articles.read');
Route::get('/categories', 'ContentController@categories')->name('categories.index');
Route::get('/home', 'ContentController@home')->name('home');

