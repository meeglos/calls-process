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

Route::get('/', [
    'as'    =>  'calls.latest',
    'uses'  =>  'TestController@index'
]);

Route::get('/shortest', [
    'as'    =>  'calls.shortest',
    'uses'  =>  'CallsController@shortest'
]);

Route::get('/longest', [
    'as'    =>  'calls.longest',
    'uses'  =>  'CallsController@longest'
]);

Route::get('/details/{id}', [
    'as'    =>  'calls.details',
    'uses'  =>  'CallsController@details'
]);

Route::get('/insert', [
    'as'    =>  'calls.insert',
    'uses'  =>  'CallsController@insert'
]);




//Route::controllers([
//    'auth'  =>  'Auth\Controller',
//    'password'  =>  'Auth\PasswordController',
//]);

//Route::get('admin', function () {
//    return view('admin_template');
//});
//
//Route::get('/test', 'TestController@index');