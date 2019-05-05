<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::fallback(function(){

    return response()->json([
        'message' => 'Page Not Found. If error persists, contact',
    ]);
});


// Routes - Patient

Route::get('/patient', 'PatientController@index');

Route::get('/patient/{id}', 'PatientController@show');

Route::put('/patient/create/', 'PatientController@create');

Route::put('/patient/update/', 'PatientController@update');

Route::delete('/patient/delete/{id}', 'PatientController@delete');


// Routes - Doctors

Route::get('/doctor', 'DoctorController@index');

Route::get('/doctor/{id}', 'DoctorController@show');

Route::put('/doctor/create/', 'DoctorController@create');

Route::put('/doctor/update/', 'DoctorController@update');

Route::delete('/doctor/delete/{id}', 'DoctorController@delete');


// Routes - Cities

Route::get('/city', 'CityController@index');

Route::get('/city/{id}', 'CityController@show');

Route::put('/city/create/', 'CityController@create');

Route::put('/city/update/', 'CityController@update');

Route::delete('/city/delete/{id}', 'CityController@delete');