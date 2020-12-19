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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customers', 'App\Http\Controllers\CustomerController@index');
Route::get('/customers/show/{id}','App\Http\Controllers\CustomerController@show');
Route::get('/customers/create','App\Http\Controllers\CustomerController@create');
Route::post('/customers/store', 'App\Http\Controllers\CustomerController@store');
Route::get('/customers/edit/{id}','App\Http\Controllers\CustomerController@edit');
Route::post('/customers/update/{id}','App\Http\Controllers\CustomerController@update');
Route::get('/customers/destroy/{id}','App\Http\Controllers\CustomerController@destroy');

Route::get('/shops', 'App\Http\Controllers\ShopController@index');
Route::get('/shops/show/{id}','App\Http\Controllers\ShopController@show');
Route::get('/shops/create','App\Http\Controllers\ShopController@create');
Route::post('/shops/store', 'App\Http\Controllers\ShopController@store');
Route::get('/shops/edit/{id}','App\Http\Controllers\ShopController@edit');
Route::post('/shops/update/{id}','App\Http\Controllers\ShopController@update');
Route::get('/shops/destroy/{id}','App\Http\Controllers\ShopController@destroy');

Route::get('/login','App\Http\Controllers\UserController@login');
Route::post('/login', 'App\Http\Controllers\UserController@handleLogin');