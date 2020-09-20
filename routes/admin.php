<?php

use Illuminate\Support\Facades\Route;

/**
 * Home page
 */

Route::group(['middleware' => 'guest:admin'], function(){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.show');
    Route::post('login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/home' ,'HomeController@index')->name('home');
    Route::get('logout' ,'Auth\LoginController@logout')->name('logout');
    Route::resource('admin_users','AdminUserController');
    Route::resource('students','StudentController')->except('show');
    Route::resource('teachers','TeacherController')->except('show');

});