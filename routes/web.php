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


/**
 * User authentication
 */
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

/**
 * Admin Login part
 */
Route::get('/login', 'Auth\LoginController@showAdminLoginForm')->name('admin_login_view');
Route::post('/login', 'Auth\LoginController@adminLogin')->name('admin_login');
Route::post('/logout', 'Auth\LoginController@adminLogout')->middleware('auth:admin');

/**
 * All admin route
 */
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::resource('/', 'AdminsController');

    Route::resource('/users', 'UserController');
    Route::resource('/activities', 'ActivityController');
    Route::resource('/foods', 'FoodController');
    Route::resource('/meals', 'MealController');
    Route::resource('/settings', 'AdminsController');
});
