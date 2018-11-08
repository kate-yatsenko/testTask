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

Route::get('/', 'HomeController@index');
Route::get('/show/{id}', 'HomeController@show');
Route::get('/showWorkers/{id}','HomeController@showWorkers');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('/companies', 'CompaniesController');
    Route::resource('/subdivisions', 'SubdivisionsController');
    Route::resource('/workers', 'WorkersController');
    Route::resource('/users', 'UsersController');
});
