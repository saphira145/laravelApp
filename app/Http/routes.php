<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('students.index');
});
Route::resource('students', 'StudentsController',[
    'except' => 'show'
]);

Route::get('students/searchAndPaginateAjax', [
    'as' => 'students.searchAndPaginateAjax',
    'uses' => 'StudentsController@searchAndPaginateAjax'
]);
//Route::controllers([
//   'auth' => 'Auth\AuthController',
//   'password' => 'Auth\PasswordController'
//]);

Route::get('auth/login', [
    'as' => 'auth.getLogin',
    'uses' => 'AuthController@getLogin'
]);
Route::post('auth/login', [
    'as' => 'auth.postLogin',
    'uses' => 'AuthController@postLogin'
]);
Route::get('auth/logout', [
    'as' => 'auth.getLogout',
    'uses' => 'AuthController@logout'
]);
