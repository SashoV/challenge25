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

Route::get('/', 'HomeController@index')->name('home')->middleware('CheckRole', 'CheckActive');
Route::get('/dashboard', 'AdminController@index')->name('dashboard')->middleware('Admin');
Route::get('/dashboard/create', 'AdminController@create')->name('create')->middleware('Admin');
Route::post('/dashboard/store', 'AdminController@store')->name('store')->middleware('Admin');

Route::get('/activate/{email}/{code}', 'UsersController@checkUserData');
Route::get('/new-link/{email}', 'UsersController@generateNewLink')->name('new-link');
