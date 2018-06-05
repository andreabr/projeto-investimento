<?php

use App\Entities\Instituition;

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


Route::get('/', ['uses' => 'Controller@homepage']);

Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
// Route::post('/login', ['as' => 'user.login','uses' => 'DashboardController@auth']);
// Route::post('/dashboard', ['as' => 'user.dashboard','uses' => 'DashboardController@index']);

Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

Route::get('/user', ['as' => 'user.index', 'uses' => 'UsersController@index']);

Route::resource('user', 'UsersController');
Route::resource('instituition', 'InstituitionsController');
Route::resource('group', 'GroupsController');

Route::post('group/{group_id}/user}', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);

Route::resource('instituition.product', 'ProductsController');

Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);