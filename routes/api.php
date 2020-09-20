<?php

use App\Http\Controllers\Api\GeneralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/////////general api


Route::get('days', 'GeneralController@days');
Route::get('governorates', 'GeneralController@governorates');
Route::get('groups', 'GeneralController@groups');
Route::get('approvedTeachers','GeneralController@approvedTeachers');
Route::get('day/{id}/teachers','GeneralController@dayTeachers');


Route::get('country/{id}/cities','CityController@countryCities');
Route::get('countries','CountryController@index');
Route::get('cities','CityController@Cities');
  

Route::group(['middleware' => 'guest:student-api', 'prefix' => 'student', 'namespace' => 'Student'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('register_mobile','AuthController@registerMobile');
    Route::post('verificate_mobile','AuthController@verificate');
});


    
Route::group(['middleware' => 'guest:teacher-api', 'prefix' => 'teacher', 'namespace' => 'Teacher'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('register_mobile','AuthController@registerMobile');
    Route::post('verificate_mobile','AuthController@verificate');
});


Route::post('supscribe','SubscriptionController@supscribe');






